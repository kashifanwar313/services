<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('id', 'DESC')->get();
        return view('dashboard.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('dashboard.plans.create', compact('services'));
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
            'service_type' => 'required',
            'plan_name' => 'required|min:5',
            'features' => 'required'
        ]);

        $features = [];

        foreach($request->features as $key => $feature){
            $features[] = array('feature' => $feature, 'status' => isset($request->status[$key]) ? $request->status[$key] : 0 );
        }

        $plan = Plan::create([
            'service_id' => $request->service_type,
            'plan_name' => $request->plan_name,
            'features' => json_encode($features)
        ]);

        if($plan)
            return redirect()->route('plans.index')->with('success', 'Plan Created Successfully');

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
    public function edit(Plan $plan)
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('dashboard.plans.edit', compact('services', 'plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'service_type' => 'required',
            'plan_name' => 'required|min:5',
            'features' => 'required'
        ]);

        $features = [];

        foreach($request->features as $key => $feature){
            $features[] = array('feature' => $feature, 'status' => isset($request->status[$key]) ? $request->status[$key] : 0 );
        }

        $plan = $plan->update([
            'service_id' => $request->service_type,
            'plan_name' => $request->plan_name,
            'features' => json_encode($features)
        ]);

        if($plan)
            return redirect()->route('plans.index')->with('success', 'Plan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plan.index')->with('success', 'Plan Deleted Succesfully');
    }
}
