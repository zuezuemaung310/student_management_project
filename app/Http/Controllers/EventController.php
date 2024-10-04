<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'date'=>'required',
            'content'=>'required',
        ]);

        if($request->image){
            $file = $request->file('image');

           $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/events',$newName);

        }
        $event = new Event();
        $event->title = $request->title;
        $event->image = $newName;
        $event->date = $request->date;
        $event->content = $request->content;
        $event->save();
        return redirect()->route('event.index')->with('success','Event created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->title = $request->title;
        if($request->image){
            $file = $request->file('image');

           $newName = uniqid().time().".".$file->extension();

            $file->storeAs('public/events',$newName);

            Storage::delete('public/events/'.$event->image);

            $event->image = $newName;
        }
        $event->date = $request->date;
        $event->content = $request->content;
        $event->update();
        return redirect()->route('event.index')->with('success','Event updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event){
            $event->delete();

            Storage::delete('public/events/',$event->image);
        }

        return redirect()->route('event.index');
    }
}
