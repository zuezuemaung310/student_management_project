@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">

                <div class="card-body">
                    <form action="{{  route('teacher.update',$teacher->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Teacher Update</h3>
                        <div class="form-group mt-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name" value="{{$teacher->name}}">
                          @error('name')
                              <span class="text-danger">{{ $message}}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{$teacher->email}}">
                            @error('email')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid  @enderror" id="phone" name="phone" value="{{$teacher->phone}}">
                            @error('phone')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid  @enderror" id="position" name="position" value="{{$teacher->position}}">
                            @error('position')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid  @enderror" id="address" name="address" value="{{$teacher->address}}">
                            @error('address')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="research_area" class="form-label">Research Area</label>
                            <input type="text" class="form-control @error('research_area') is-invalid  @enderror" id="research_area" name="research_area" value="{{$teacher->research_area}}">
                            @error('research_area')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <img src="{{asset('storage/users/'.$teacher->profile)}}" width="100px" height="100px"><br><br>
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" class="form-control" id="profile" name="profile">
                            @error('profile')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Teacher</button>
                            <a href="{{route('teacher.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

