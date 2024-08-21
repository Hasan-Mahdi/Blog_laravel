@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"><span class="text-warning">{{$post->title}}</span></h1>
        <div class="d-flex gap-3 justify-content-center mb-3">
            <a href="{{route('posts.edit' , $post)}}" class="btn btn-outline-info">edit</a>
            <form action="{{route('posts.destroy', $post)}}" method="post">
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-outline-danger" value="delete">
            </form>
        </div>
        <img src="{{url('images/'.$post->image_path)}}" class="w-100" alt="">
        <br>
        <h3>{{$post->description}}</h3>

        <br>

        Show Page

    </div>{{-- conainer --}}
@endsection
