@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <h3>Teacher Lists</h3>
                    <a href="{{route('teacher.create')}}" class="btn btn-primary my-3">Create</a>

                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Research Area</th>
                            <th>Address</th>
                            <th>Profile</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->id}}</td>
                                <td>{{ $teacher->name}}</td>
                                <td>{{ $teacher->email}}</td>
                                <td>{{ $teacher->phone}}</td>
                                <td>{{ $teacher->research_area}}</td>
                                <td>{{ $teacher->address}}</td>
                                <td><img src={{ asset('storage/users/'.$teacher->profile)}} width="100px" height="100px"></td>
                                <td>
                                    <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('teacher.destroy',$teacher->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
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

