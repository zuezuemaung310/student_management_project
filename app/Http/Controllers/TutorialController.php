<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Tutorial;
use App\Http\Requests\StoreTutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Tutorial::all();
        $years = Year::all();
        return view('tutorial.index',compact('years','marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        return view('tutorial.create',compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTutorialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTutorialRequest $request)
    {
        $request->validate([
            'student_id'=>'required',
            'year_id'=>'required',

        ]);

        $tutorial = new Tutorial();
        $tutorial->student_id = $request->student_id;
        $tutorial->year_id = $request->year_id;
        $tutorial->subject1 = $request->subject1;
        $tutorial->subject2 = $request->subject2;
        $tutorial->subject3 = $request->subject3;
        $tutorial->subject4 = $request->subject4;
        $tutorial->subject5 = $request->subject5;
        $tutorial->subject6 = $request->subject6;
        $tutorial->save();
        return redirect()->route('tutorial.index')->with('success', 'Tutorial created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutorial = Tutorial::find($id);
        $years = Year::all();
        return view('tutorial.edit',compact('tutorial','years'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTutorialRequest  $request
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTutorialRequest $request,$id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->student_id = $request->student_id;
        $tutorial->year_id = $request->year_id;
        $tutorial->subject1 = $request->subject1;
        $tutorial->subject2 = $request->subject2;
        $tutorial->subject3 = $request->subject3;
        $tutorial->subject4 = $request->subject4;
        $tutorial->subject5 = $request->subject5;
        $tutorial->subject6 = $request->subject6;
        $tutorial->update();
        return redirect()->route('tutorial.index')->with('success', 'Tutorial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutorial = Tutorial::find($id);
        if($tutorial){
            $tutorial->delete();
        }
        return redirect()->route('tutorial.index');
    }
}
