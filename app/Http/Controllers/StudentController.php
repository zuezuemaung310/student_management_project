<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $students = User::all();
        $students = User::where('role','student')->get();
        $years = Year::all();
        return view('student.index',compact('students','years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        return view('student.create',compact('years'));
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
            'roll_number'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'address'=>'required',
            'profile'=>'required',
        ]);
        if($request->profile){
            $file = $request->file('profile');

            $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/users',$newName);
        }
        $student = new User();
        $student->roll_number = $request->roll_number;
        $student->name = $request->name;
        $student->year_id = $request->year_id;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->password = Hash::make($request->password);
        $student->address = $request->address;
        $student->profile = $newName;
        $student->role= "student";
        $student->save();

        return redirect()->route('student.index')->with('success','Student created Successfully');
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
    public function edit($id)
    {
        $student= User::find($id);
        $years = Year::all();
        return view('student.edit',compact('student','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student=User::find($id);
        $student->roll_number = $request->roll_number;
        $student->name = $request->name;
        $student->year_id = $request->year_id;
        $student->email = $request->email;
        $student->phone = $request->phone;
      //  $student->password = Hash::make($request->password);
        $student->address = $request->address;
        if($request->profile){
            $file = $request->file('profile');

           $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/users',$newName);

            Storage::delete('public/users/'.$student->profile);

            $student->profile = $newName;

        }
        $student->update();

        return redirect()->route('student.index')->with('success','Student updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);

        if($student){
            $student->delete();
            Storage::delete('public/users/'.$student->profile);
        }
        return redirect()->route('student.index');
    }
}
