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
                    <h3>Tutoial Mark Lists</h3>
                    @if(Auth::check() && Auth::user()->role !== 'student')
                    <a href="{{route('tutorial.create')}}" class="btn btn-primary my-3">Create</a>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Student Id</th>
                            <th>Year</th>
                            <th>CS001</th>
                            <th>CS002</th>
                            <th>CS003</th>
                            <th>CS004</th>
                            <th>CS005</th>
                            <th>CS006</th>
                            @if(Auth::check() && Auth::user()->role !== 'student')
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($marks as $mark)
                            <tr>
                                <td>{{ $mark->id}}</td>
                                <td>{{ $mark->student_id}}</td>
                                <td>{{ $mark->year->yname}}</td>
                                <td>{{ $mark->subject1}}</td>
                                <td>{{ $mark->subject2}}</td>
                                <td>{{ $mark->subject3}}</td>
                                <td>{{ $mark->subject4}}</td>
                                <td>{{ $mark->subject5}}</td>
                                <td>{{ $mark->subject6}}</td>
                                <td>
                                    @if(Auth::check() && Auth::user()->role !== 'student')
                                    <a href="{{route('tutorial.edit',$mark->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('tutorial.destroy',$mark->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
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


