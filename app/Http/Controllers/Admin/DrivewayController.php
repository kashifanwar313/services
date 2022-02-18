<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DrivewaySidewalkPatios;
use Illuminate\Http\Request;

class DrivewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driveways = DrivewaySidewalkPatios::orderBy('id', 'DESC')->get();
        return view('dashboard.driveway.index', compact('driveways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.driveway.create');
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
            'name' => 'required|min:5'
        ]);

        DrivewaySidewalkPatios::create($validated_data);
        return redirect()->route('drive.way.index')->with('success', 'Driveway Created Succesfully');
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
    public function edit(DrivewaySidewalkPatios $drive_way)
    {
        return view('dashboard.driveway.edit', compact('drive_way'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrivewaySidewalkPatios $drive_way)
    {
        $validated_data = $request->validate([
            'name' => 'required|min:5'
        ]);

        $drive_way->update($validated_data);
        return redirect()->route('drive.way.index')->with('success', 'Driveway Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrivewaysidewalkPatios $drive_way)
    {
        $drive_way->delete();
        return redirect()->route('drive.way.index')->with('success', 'Driveway Deleted Succesfully');
    }
}
