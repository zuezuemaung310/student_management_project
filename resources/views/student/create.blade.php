@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Student Create</h3>
                        <div class="form-group mt-3">
                            <label for="roll_number" class="form-label">Roll Number</label>
                            <input type="text" class="form-control @error('roll_number') is-invalid  @enderror" id="roll_number" name="roll_number">
                            @error('roll_number')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name">
                          @error('name')
                              <span class="text-danger">{{ $message}}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label>Year</label>
                            <select class="form-select" name="year_id">
                                @foreach ($years as $year)
                                    <option value="{{$year->id}}">{{ $year->yname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid  @enderror" id="email" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid  @enderror" id="password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid  @enderror" id="phone" name="phone">
                            @error('phone')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid  @enderror" id="address" name="address">
                            @error('address')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" class="form-control" id="profile" name="profile">
                            @error('profile')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Student</button>
                            <a href="{{route('admin.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

