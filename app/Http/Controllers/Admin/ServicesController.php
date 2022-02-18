<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('dashboard.services.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $generated_new_name = '';
        if ($request->hasFile('image')) {
            $generated_new_name = uploadImage($request->file('image'));
        }
        Service::create([
            'name' => $request->name,
            'image' => $generated_new_name
        ]);
        return redirect()->route('services.index')->with('success', 'Service Created Succesfully');
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
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $generated_new_name = '';
        if ($request->hasFile('image')) {
            $generated_new_name = uploadImage($request->file('image'));
            if($service->image){
                deleteImageFromDir($service->image);
            }
        } else {
            $generated_new_name = $service->image;
        }
        $service->update([
            'name' => $request->name,
            'image' => $generated_new_name
        ]);
        return redirect()->route('services.index')->with('success', 'Service Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->image){
            deleteImageFromDir($service->image);
        }

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service Deleted Succesfully');
    }
}
