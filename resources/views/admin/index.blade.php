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
                    <h3>Admin Lists</h3>
                    <a href="{{route('admin.create')}}" class="btn btn-primary my-3">Create</a>

                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id}}</td>
                                <td>{{ $admin->name}}</td>
                                <td>{{ $admin->email}}</td>
                                <td>{{ $admin->phone}}</td>
                                <td>{{ $admin->role }}</td>
                                <td>{{ $admin->address}}</td>
                                <td>
                                    <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.destroy',$admin->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
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

