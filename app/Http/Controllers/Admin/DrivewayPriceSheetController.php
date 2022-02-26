<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\NuOfCar;
use App\Models\PriceSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DrivewaySidewalkPatios;

class DrivewayPriceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price_sheets = PriceSheet::with(['plan', 'driveway_sidewaik_patios', 'nu_of_car'])->where('type', 'Driveway')->orderBy('id', 'Desc')->get();
        return view('dashboard.drive_way_price_sheet.index', compact('price_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driveways = DrivewaySidewalkPatios::orderBy('id', 'DESC')->get();
        $no_of_cars = NuOfCar::orderBy('id', 'DESC')->get();
        $plans = Plan::where('service_id', 10)->orderBy('id', 'DESC')->get();
        return view('dashboard.drive_way_price_sheet.create', compact('driveways', 'no_of_cars', 'plans'));
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
            'driveway_sidewalk_patio_id' => 'required|integer',
            //'nu_of_car_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'price' => 'required|integer',
            'time' => 'required|string'
        ]);

        $validate_data['type'] = 'Driveway';

        $price_sheet = PriceSheet::create($validate_data);

        if($price_sheet)
            return redirect()->route('driveway.price.sheet.index')->with('success', 'Price Sheet Created Successfully');
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
    public function edit(PriceSheet $driveway_price_sheet)
    {
        $driveways = DrivewaySidewalkPatios::orderBy('id', 'DESC')->get();
        $no_of_cars = NuOfCar::orderBy('id', 'DESC')->get();
        $plans = Plan::orderBy('id', 'DESC')->get();
        return view('dashboard.drive_way_price_sheet.edit', compact('driveways', 'no_of_cars', 'plans', 'driveway_price_sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceSheet $driveway_price_sheet)
    {
        $validate_data = $request->validate([
            'driveway_sidewalk_patio_id' => 'required|integer',
            'nu_of_car_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'price' => 'required|integer',
            'time' => 'required|string'
        ]);

        $price_sheet = $driveway_price_sheet->update($validate_data);

        if($price_sheet)
            return redirect()->route('driveway.price.sheet.index')->with('success', 'Price Sheet Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
