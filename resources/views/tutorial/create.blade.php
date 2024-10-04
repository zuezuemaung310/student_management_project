@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tutorial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Tutorial Create</h3>
                        <div class="form-group">
                            <label for="student_id" class="form-label">Student Id</label>
                            <input type="text" class="form-control @error('student_id') is-invalid  @enderror" id="student_id" name="student_id">
                            @error('student_id')
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
                        <div class="form-group">
                            <label for="subject1" class="form-label">CS001</label>
                            <input type="text" class="form-control" id="subject1" name="subject1">
                        </div>
                        <div class="form-group">
                            <label for="subject2" class="form-label">CS002</label>
                            <input type="text" class="form-control" id="subject2" name="subject2">
                        </div>
                        <div class="form-group">
                            <label for="subject3" class="form-label">CS003</label>
                            <input type="text" class="form-control" id="subject3" name="subject3">

                        </div>
                        <div class="form-group">
                            <label for="subject4" class="form-label">CS004</label>
                            <input type="text" class="form-control" id="subject4" name="subject4">
                        </div>
                        <div class="form-group">
                            <label for="subject5" class="form-label">CS005</label>
                            <input type="text" class="form-control" id="subject5" name="subject5">
                        </div>
                        <div class="form-group">
                            <label for="subject6" class="form-label">CS006</label>
                            <input type="text" class="form-control" id="subject6" name="subject6">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Tutorial</button>
                            <a href="{{route('tutorial.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

