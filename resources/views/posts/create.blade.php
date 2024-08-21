@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"><span class="text-warning">Create New Post</span></h1>
        <br>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" style="max-width:400px; margin:auto">
          @csrf
          {{-- @method('PUT') --}} <!-- Uncomment if updating an existing record instead of creating a new one -->
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" autofocus class="form-control" value="{{ old('title') }}" name="title" id="title">
              @error('title')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
              @error('description')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="image_path" class="form-label">Image</label>
              <input type="file" class="form-control" name="image_path" id="image_path">
              @error('image_path')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          <button type="submit" class="btn btn-outline-info px-5">Submit</button>
      </form>
      
    </div>{{-- conainer --}}
@endsection