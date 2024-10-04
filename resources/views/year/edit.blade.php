@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('year.update',$year->id)}}"  method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Year Update</h3>
                        <div class="form-group">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{$year->yname}}">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Year</button>
                            <a href="{{route('year.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

