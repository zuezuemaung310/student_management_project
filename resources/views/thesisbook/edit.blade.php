@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('thesisbook.update',$thesisBook->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Thesis Book Update</h3>
                        <div class="form-group">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$thesisBook->title}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{$thesisBook->content}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control" id="level" name="level" value="{{$thesisBook->level}}">
                        </div>
                        <div class="form-group mt-3">
                            <a href={{ asset('storage/thesisbooks/'.$thesisBook->thesis_file)}}>Thesis Book is {{$thesisBook->thesis_file}} </a> <br><br>

                            <label for="file" class="form-label">Thesis Book</label>
                            <input type="file" class="form-control" id="file" name="thesis_file">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Thesis Book</button>
                            <a href="{{route('thesisbook.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

