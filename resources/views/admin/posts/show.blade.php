@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="mt-4" style="display: inline-block; text-decoration: none" href="{{route('admin.posts.index')}}"><< Back to posts</a>
        <h1 class="mt-3">{{ $post->title }} </h1>
        <strong>Slug: </strong> <span>{{ $post->slug}}</span><br><br>
        <p class="w-50">{{$post->content}}</p><br>
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
    </div>
@endsection
