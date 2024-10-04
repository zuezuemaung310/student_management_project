@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('thesisbook.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Thesis Book Create</h3>
                        <div class="form-group mt-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title">
                          @error('title')
                              <span class="text-danger">{{ $message}}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control @error('content') is-invalid  @enderror" id="content" name="content">
                            @error('content')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control @error('level') is-invalid  @enderror" id="level" name="level">
                            @error('level')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="thesis_file" class="form-label">Thesis Book</label>
                            <input type="file" class="form-control" id="thesis_file" name="thesis_file">
                            @error('thesis_file')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Thesis Book</button>
                            <a href="{{route('thesisbook.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

