@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"><span class="text-warning">All Posts</span></h1>
        <br>
        {{-- @if (A)
            
        @endif --}}
        @auth
        @endauth
        
        @if (Auth::check())
        <a href="{{route('posts.create')}}" class="btn btn-outline-success px-4 mb-2">Add New Post</a>
            
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-6 mb-3">
                <img src="{{url("images/".$post->image_path)}}" class="w-100 rounded shadow" alt="">
            </div>{{-- col-md-6 --}}
            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                <div class="w-100">
                    <h2>{{$post->title}}</h2>
                    <p class="text-light">Created by: {{$post->user->name}}</p>
                    <p class="text-light">Created at: {{ date("Y-m-d", strtotime($post->created_at))}}</p>
                    <h5> {{$post->description}}</h5>
                    <a href="{{route("posts.show", $post)}}" class="btn text-warning">Read More</a>

                </div>{{--  --}}
            </div>{{-- col-md-6 --}}
        </div>{{-- row --}}
        @endforeach
    </div>
@endsection