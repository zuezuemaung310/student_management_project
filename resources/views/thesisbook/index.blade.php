@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <h3>Thesis Book Lists</h3>
                    @if(Auth::check() && Auth::user()->role !== 'student')
                    <a href="{{route('thesisbook.create')}}" class="btn btn-primary my-3">Create</a>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Level</th>
                            <th>Thesis Book</th>
                            @if(Auth::check() && Auth::user()->role !== 'student')
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($thesisBooks as $thesisBook)
                            <tr>
                                <td>{{ $thesisBook->id}}</td>
                                <td>{{ $thesisBook->title}}</td>
                                <td>{{ $thesisBook->content}}</td>
                                <td>{{ $thesisBook->level}}</td>
                                <td>
                                    <a href="{{asset('/storage/thesisbooks/'.$thesisBook->thesis_file)}}"><i class="fa-solid fa-book"></i>&nbsp;Thesis Book</a>
                                    <a href="{{ route('thesis.download', $thesisBook->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <td>
                                    @if(Auth::check() && Auth::user()->role !== 'student')
                                    <a href="{{route('thesisbook.edit',$thesisBook->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('thesisbook.destroy',$thesisBook->id)}}" method="post" class="d-inline" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

