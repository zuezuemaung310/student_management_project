@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8  mt-5">
            <div class="card card-about">

                <div class="card-body">
                    <form action="{{ route('year.store')}}" method="post">
                        @csrf
                        <h3>Year Create</h3>
                        
                        <div class="form-group">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name">
                          @error('name')
                              <span class="text-danger">{{ $message}}</span>
                          @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Year</button>
                            <a href="{{route('year.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

