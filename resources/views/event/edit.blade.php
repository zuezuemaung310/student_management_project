@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('event.update',$event->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Event Update</h3>
                        <div class="form-group">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
                        </div>
                        <div class="form-group mt-3">
                            <img src={{ asset('storage/events/'.$event->image)}} width="100px" height="100px"> <br><br>
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group mt-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$event->date}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{$event->content}}">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Event</button>
                            <a href="{{route('event.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

