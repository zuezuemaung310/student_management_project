@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8  mt-5">
            <div class="card">
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h3>Year List</h3>
                    <a href="{{route('year.create')}}" class="btn btn-primary">Create</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($years as $year)
                            <tr>
                                <!--<td> $loop->iteration</td> -->
                                <td>{{ $year->id}}</td>
                                <td>{{ $year->yname}}</td>
                                <td>
                                    <a href="{{route('year.edit',$year->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('year.destroy',$year->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
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

