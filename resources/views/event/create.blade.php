@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>Event Create</h3>
                        <div class="form-group mt-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title">
                          @error('title')
                              <span class="text-danger">{{ $message}}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid  @enderror" id="date" name="date">
                            @error('title')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control @error('content') is-invalid  @enderror" id="content" name="content">
                            @error('content')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                            <a href="{{route('event.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

