<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\Story;
use App\Models\PriceSheet;
use App\Models\SquareFoot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price_sheets = PriceSheet::with(['square_foot', 'story', 'plan'])->where('type', null)->orderBy('id', 'Desc')->get();
        return view('dashboard.price_sheet.index', compact('price_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $square_foots = SquareFoot::orderBy('id', 'DESC')->get();
        $stories = Story::orderBy('id', 'DESC')->get();
        $plans = Plan::where('service_id', '!=', 10)->orderBy('id', 'DESC')->get();
        return view('dashboard.price_sheet.create', compact('square_foots', 'stories', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'square_foot_id' => 'required|integer',
            'story_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'price' => 'required|integer',
            'time' => 'required|string'
        ]);

        $price_sheet = PriceSheet::create($validate_data);

        if($price_sheet)
            return redirect()->route('price.sheet.index')->with('success', 'Price Sheet Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceSheet $price_sheet)
    {
        $square_foots = SquareFoot::orderBy('id', 'DESC')->get();
        $stories = Story::orderBy('id', 'DESC')->get();
        $plans = Plan::orderBy('id', 'DESC')->get();
        return view('dashboard.price_sheet.edit', compact('square_foots', 'stories', 'plans', 'price_sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceSheet $price_sheet)
    {
        $validate_data = $request->validate([
            'square_foot_id' => 'required|integer',
            'story_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'price' => 'required|integer',
            'time' => 'required|string'
        ]);

        $price_sheet = $price_sheet->update($validate_data);

        if($price_sheet)
            return redirect()->route('price.sheet.index')->with('success', 'Price Sheet Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceSheet $price_sheet)
    {
        $price_sheet->delete();
        return redirect()->route('price.sheet.index')->with('success', 'Price Sheet Deleted Succesfully');
    }
}
