@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>All User Lists</h3>
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
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->phone}}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->address}}</td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('user.destroy',$user->id)}}" method="post" class="d-inline">
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

