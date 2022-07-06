@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-3 mb-4">Tutti i post esistenti</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('admin.posts.show', $post)}}">Show</a>
                            <a class="btn btn-primary" href="{{route('admin.posts.edit', $post)}}">Edit</a>

                            <form class="d-inline"
                             action=""
                             method="POST">
                             @csrf
                             @method('DELETE')
                             <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

@endsection
