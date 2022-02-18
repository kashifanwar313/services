<?php

namespace App\Http\Controllers\Admin;

use App\Models\SquareFoot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SquareFootResource;

class SquareFootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $square_foots = SquareFoot::orderBy('id', 'DESC')->get();
        return view('dashboard.square_foot.index', compact('square_foots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.square_foot.create');
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
            'square_foot' => 'required'
        ]);

        $square_foot = SquareFoot::create($validate_data);

        if($square_foot)
            return redirect()->route('square.foot.index')->with('success', 'Square Foot Created Successfully');
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
    public function edit(SquareFoot $square_foot)
    {
        return view('dashboard.square_foot.edit', compact('square_foot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SquareFoot $square_foot)
    {
        $validate_data = $request->validate([
            'square_foot' => 'required'
        ]);

        $square_foot = $square_foot->update($validate_data);
        if($square_foot)
            return redirect()->route('square.foot.index')->with('success', 'Square Foot Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SquareFoot $square_foot)
    {
        $square_foot->delete();
        return redirect()->route('square.foot.index')->with('success', 'Square Foot Deleted Successfully');
    }
}
