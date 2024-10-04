@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <h3>Event Lists</h3>
                    @if(Auth::check() && Auth::user()->role !== 'student')
                    <a href="{{route('event.create')}}" class="btn btn-primary my-3">Create</a>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Content</th>
                            @if(Auth::check() && Auth::user()->role !== 'student')
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id}}</td>
                                <td>{{ $event->title}}</td>
                                <td><img src={{ asset('storage/events/'.$event->image)}} width="100px" height="100px"></td>
                                <td>{{ $event->date}}</td>
                                <td>{{ $event->content}}</td>
                                <td>
                                    @if(Auth::check() && Auth::user()->role !== 'student')
                                    <a href="{{route('event.edit',$event->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('event.destroy',$event->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


