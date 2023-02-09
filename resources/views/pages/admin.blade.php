@extends('layouts.main-layout')

@section('content')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1 class="text-center"><a href="{{ route('project.create') }}">Add New Project</a></h1>

<div class="card_container d-flex gap-4 justify-content-center mt-5">

    @foreach ($projects as $project)
    <div class="card">
      <div class="d-flex justify-content-between mx-2">
        <a href="{{ route('project.edit', $project) }}">
            EDIT
        </a>
        <a href="{{ route('project.delete', $project) }}">DELETE</a>
      </div>
    <a href="{{ route('project.show', $project) }}">
            <div class="box">
                <div class="img">
                    <img src="{{ $project -> main_image }}">
                </div>
                <h2>
                    <br>
                    <span>{{ $project -> release_date }}
                    </span>
                </h2>
                <p> {{ $project -> description }}</p>
                <span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $project -> repo_link }}"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </span>
            </div>
    </a>
</div>
    @endforeach
</div>

@endsection