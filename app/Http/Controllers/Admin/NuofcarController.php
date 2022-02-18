<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NuOfCar;
use Illuminate\Http\Request;

class NuofcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nu_of_cars = NuOfCar::orderBy('id', 'DESC')->get();
        return view('dashboard.nu_of_cars.index', compact('nu_of_cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.nu_of_cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'nu_of_cars' => 'required'
        ]);

        NuOfCar::create($validated_data);
        return redirect()->route('nu.of.cars.index')->with('success', 'Cars Created Succesfully');
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
    public function edit(NuOfCar $nu_of_car)
    {
        return view('dashboard.nu_of_cars.edit', compact('nu_of_car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NuOfCar $nu_of_car)
    {
        $validated_data = $request->validate([
            'nu_of_cars' => 'required'
        ]);

        $nu_of_car->update($validated_data);
        return redirect()->route('nu.of.cars.index')->with('success', 'Cars Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NuOfCar $nu_of_car)
    {
        $nu_of_car->delete();
        return redirect()->route('nu.of.cars.index')->with('success', 'Cars Deleted Succesfully');
    }
}
