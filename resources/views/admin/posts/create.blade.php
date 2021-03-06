@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-3 mb-4">Crea nuovo Post</h1>
        <p style="font-size: 18px">Compila i dati e fai click su <span style="color: blue; text-decoration: underline">invia</span> per creare un nuovo post nel database.</p>

        @if ($errors->any())
            <div class="w-50 alert alert-danger">
                    <ul>
                        {{-- $errors->all() reistituisce l'array ceon tutti gli errori --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
        @endif


        <div class="w-50">
            <form action="{{ route('admin.posts.store')}}" method="POST">
                {{-- @csrf deve essere inserito in tutti i form altrimenti il form non è valido --}}
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label sc-label">Titolo Post</label>
                    {{-- il name dell'input deve corrispondere al nome della colonna della tabella di riferimento --}}
                    <input type="text" id="title" name="title"
                    value="{{old('title')}}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="Titolo Post">

                    @error('title')
                        <p class="error-msg text-danger"> {{$message}} </p>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug"
                    name="slug"
                    value="{{old('slug')}}"
                    class="form-control @error('slug') is-invalid @enderror "
                    placeholder="Slug post" >

                    @error('slug')
                        <p class="error-msg text-danger"> {{$message}} </p>
                    @enderror

                </div>

                <div class="mb-3">

                    <label for="content" class="form-label">Content</label>
                    <textarea
                    class="form-control @error('content') is-invalid @enderror"
                    name="content" id="content" cols="30" rows="10"
                    placeholder="Content">
                    {{ old('content') }}
                    </textarea>

                    @error('content')
                        <p class="error-msg text-danger"> {{$message}} </p>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>




    </div>

@endsection
