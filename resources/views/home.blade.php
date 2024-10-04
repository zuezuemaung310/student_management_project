@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="bg-white">
                <div class="row " >
                    <div class="col-md-5 py-5 px-5 mt-5">
                        <h3 class="text-center py-3">Student Managament Project</h3>
                        <p class="py-3 px-3">
                            Welcome to our Student Management System,<br> designed to simplify administration for admins, teachers, and students. With full CRUD functionality, manage profiles, events, thesis submissions, books, and tutorials effortlessly. Streamline your educational processes and enhance productivity with our user-friendly platform.
                        </p>
                    </div>
                    <div class="col-md-7">
                        <img src="{{asset('dist/img/bg.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

