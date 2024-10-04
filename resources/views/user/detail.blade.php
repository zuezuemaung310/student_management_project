@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>User Detail</h3>
                    <div class="card col-6">
                      <div class="card-body ">
                        <ul>
                            <li>Name: {{ $user->name }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Phone: {{ $user->phone }}</li>
                            <li>Address: {{ $user->address }}</li>

                            @if($user->role == 'admin')
                                <li>Role: {{ $user->role }}</li>
                            @elseif($user->role == 'student')
                                <li>Roll Number: {{ $user->roll_number }}</li>
                                <li> Year: {{ $user->year->yname }}</li>
                                <li>Role: {{ $user->role }}</li>
                            @elseif($user->role == 'teacher')
                                <li>Position: {{ $user->position }}</li>
                                <li>Research Area: {{ $user->research_area }}</li>
                                <li>Role: {{ $user->role }}</li>
                            @endif
                        </ul>
                        <br>
                        <a href="{{route('user.index')}}" class="btn btn-dark">Back</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


