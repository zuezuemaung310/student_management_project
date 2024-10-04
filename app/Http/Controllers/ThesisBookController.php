<?php

namespace App\Http\Controllers;

use App\Models\ThesisBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThesisBookController extends Controller
{
    public function download($id)
    {
        $thesisBook = ThesisBook::findOrFail($id);
        $filePath = storage_path('app/public/thesisbooks/' . $thesisBook->thesis_file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return abort(404, 'File not found.');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thesisBooks = ThesisBook::all();
        return view('thesisbook.index',compact('thesisBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thesisbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        'title'=>'required',
        'content'=>'required',
        'level'=>'required',
        'thesis_file'=>'required',
    ]);

    if($request->thesis_file){
        $file = $request->file('thesis_file');

       $newName = uniqid().time().".".$file->extension();

        $file->storeAs('public/thesisbooks',$newName);

    }
    $thesisBook = new ThesisBook();
    $thesisBook->title = $request->title;
    $thesisBook->content = $request->content;
    $thesisBook->level = $request->level;
    $thesisBook->thesis_file = $newName;
    $thesisBook->save();
    return redirect()->route('thesisbook.index')->with('success','Thesisbook created Successfully');

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
        $thesisBook = ThesisBook::find($id);
        return view('thesisbook.edit',compact('thesisBook'));
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
        $thesisBook = ThesisBook::find($id);
        $thesisBook->title = $request->title;
        $thesisBook->content = $request->content;
        $thesisBook->level = $request->level;
        if($request->thesis_file){
            $file = $request->file('thesis_file');

           $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/thesisbooks',$newName);

            Storage::delete('public/thesisbooks/'.$thesisBook->image);

            $thesisBook->image = $newName;
        }

        $thesisBook->update();
        return redirect()->route('thesisbook.index')->with('success','Thesisbook updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thesisBook = ThesisBook::find($id);
        if($thesisBook){

            $thesisBook->delete();
            Storage::delete('public/thesisbooks/',$thesisBook->thesis_file);
        }

        return redirect()->route('thesisbook.index');
    }
}
