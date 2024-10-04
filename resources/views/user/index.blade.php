@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-4">
                        <h3>All User Lists</h3>
                       </div>
                        <div class="offset-4 col-md-3">
                             <!-- Search Form -->
                         <form action="{{ route('user.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search users..." value="{{ request()->input('search') }}">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-search"></i></button>
                            </div>
                        </form>
                        </div>
                    </div>
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
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>

                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                    <!-- End Pagination Links -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

