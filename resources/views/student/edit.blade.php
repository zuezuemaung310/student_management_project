@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">

                <div class="card-body">
                    <form action="{{  route('student.update',$student->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Student Update</h3>
                        <div class="form-group mt-3">
                            <label for="roll_number" class="form-label">Roll Number</label>
                            <input type="text" class="form-control" id="roll_number" name="roll_number" value="{{$student->roll_number}}">

                          </div>
                        <div class="form-group mt-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}">
                        </div>
                        <div class="form-group mt-3">
                            <label>Year</label>
                            <select class="form-select" name="year_id">
                                @foreach ($years as $year)
                                <option value="{{$year->id}}" {{$student->year_id == $year->id ? 'selected' : '' }}>{{ $year->yname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">

                        </div>
                        <div class="form-group mt-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">

                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid  @enderror" id="address" name="address" value="{{ $student->address }}">
                            @error('address')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <img src="{{asset('storage/users/'.$student->profile)}}" width="100px" height="100px"><br><br>
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" class="form-control" id="profile" name="profile" value="{{ $student->profile }}">
                            @error('profile')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Student</button>
                            <a href="{{route('admin.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

