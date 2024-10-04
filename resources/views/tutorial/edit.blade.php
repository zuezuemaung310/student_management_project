@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>Tutorial Update</h3>
                    <form action="{{ route('tutorial.update',$tutorial->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_id" class="form-label">Student Id</label>
                            <input type="text" class="form-control @error('student_id') is-invalid  @enderror" id="student_id" name="student_id" value="{{$tutorial->student_id}}">
                            @error('student_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label>Year</label>
                            <select class="form-select" name="year_id">
                                @foreach ($years as $year)
                                <option value="{{$year->id}}" {{$tutorial->year_id == $year->id ? 'selected' : '' }}>{{ $year->yname }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group mt-3">
                            <label for="year_id" class="form-label">Year</label>
                            <select class="form-select @error('year_id') is-invalid @enderror" name="year_id">
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ $tutorial->year_id == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                                @endforeach
                            </select>
                            @error('year_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="subject1" class="form-label">CS001</label>
                            <input type="text" class="form-control" id="subject1" name="subject1" value="{{$tutorial->subject1}}">
                        </div>
                        <div class="form-group">
                            <label for="subject2" class="form-label">CS002</label>
                            <input type="text" class="form-control" id="subject2" name="subject2" value="{{$tutorial->subject2}}">
                        </div>
                        <div class="form-group">
                            <label for="subject3" class="form-label">CS003</label>
                            <input type="text" class="form-control" id="subject3" name="subject3" value="{{$tutorial->subject3}}">

                        </div>
                        <div class="form-group">
                            <label for="subject4" class="form-label">CS004</label>
                            <input type="text" class="form-control" id="subject4" name="subject4" value="{{$tutorial->subject4}}">
                        </div>
                        <div class="form-group">
                            <label for="subject5" class="form-label">CS005</label>
                            <input type="text" class="form-control" id="subject5" name="subject5" value="{{$tutorial->subject5}}">
                        </div>
                        <div class="form-group">
                            <label for="subject6" class="form-label">CS006</label>
                            <input type="text" class="form-control" id="subject6" name="subject6" value="{{$tutorial->subject6}}">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Tutorial</button>
                            <a href="{{route('tutorial.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

