<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Service;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'DESC')->get();
        return view('dashboard.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('dashboard.questions.create', compact('services'));
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
            'service_id'    => 'required',
            'question'      => 'required',
            'type_id'       => 'required'
        ]);

        $question = Question::create($validate_data);
        if( request()->has('options') AND !empty($request->input('options')) ){
            foreach(request()->options as $option){
                $question->options()->create([
                    'option'    => $option,
                    'type_id'   => request()->options_type_id,
                    'data_type' => request()->options_data
                ]);
            }
        }
        return redirect()->route('questions.index')->with('success', 'Question Created Successfully');
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
    public function edit(Question $question)
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('dashboard.questions.edit', compact('services', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validate_data = $request->validate([
            'service_id'    => 'required',
            'question'      => 'required',
            'type_id'       => 'required'
        ]);

        $question->update($validate_data);

        $question->options()->delete();
        if( request()->has('options') && !empty($request->input('options')) ){
            foreach (request()->options as $option) {
                $question->options()->create([
                    'option'    => $option,
                    'type_id'   => request()->options_type_id,
                    'data_type' => request()->options_data
                ]);
            }
        }
        return redirect()->route('questions.index')->with('success', 'Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question Deleted Successfully');
    }

    /**
     * Get all the questions list.
     */
    public function questions($id) {
        return QuestionResource::collection(Question::with(['options'])->where('service_id', $id)->get());
    }
}
