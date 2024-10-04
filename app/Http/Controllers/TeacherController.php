<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $teachers = User::all();
       $teachers = User::where('role','teacher')->get();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'address'=>'required',
            'position'=>'required',
            'research_area'=>'required',
            'profile'=>'required',
        ]);
        if($request->profile){
            $file = $request->file('profile');

            $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/users',$newName);
        }
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->password = Hash::make($request->password);
        $teacher->position = $request->position;
        $teacher->address = $request->address;
        $teacher->research_area = $request->research_area;
        $teacher->profile = $newName;
        $teacher->role= "teacher";
        $teacher->save();

        return redirect()->route('teacher.index')->with('success','Teacher created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::find($id);
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher=User::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->address =  $request->address;
       // $teacher->password =Hash::make($request->position);
        $teacher->position = $request->position;
        $teacher->research_area = $request->research_area;
        if($request->profile){
            $file = $request->file('profile');

           $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/users',$newName);

            Storage::delete('public/users/'.$teacher->profile);

            $teacher->profile = $newName;

        }
        $teacher->update();

        return redirect()->route('teacher.index')->with('success','Teacher updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::find($id);

        if($teacher){
            $teacher->delete();
            Storage::delete('public/users/'.$teacher->profile);
        }
        return redirect()->route('teacher.index');
    }
}
