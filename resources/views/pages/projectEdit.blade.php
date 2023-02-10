@extends('layouts.main-layout')

@section('content')
    
<div class="container text-light text-center">
  <h1>Edit project</h1>
  <form method="POST" action="{{ route('admin.project.update', $project) }}" enctype="multipart/form-data">
      @csrf
      <label for="name">Name</label>
      <input type="text" name="name" value="{{ $project -> name }}">
      <br>
      <label for="description">Description</label>
      <textarea type="text" name="description" value={{ $project -> description }}></textarea>
      <br>
      <label for="main_image">Main image</label>
      <input type="file" name="main_image"value="{{ $project -> main_image }}">
      <br>
      <label for="release_date">Release Date</label>
      <input type="date" name="release_date" value="{{ $project -> release_date }}">
      <br>
      <label for="repo_link">Repo Link</label>
      <input type="text" name="repo_link" value="{{ $project -> repo_link }}">
      <br>
      <input type="submit" value="Update project">
  </form>
</div>

@endsection