@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-3 mb-4">Crea nuovo Post</h1>
        <p style="font-size: 18px">Compila i dati e fai click su <span style="color: blue; text-decoration: underline">invia</span> per creare un nuovo post nel database.</p>


        <div class="w-50">
            <form action="{{ route('admin.posts.store')}}" method="POST">
                {{-- @csrf deve essere inserito in tutti i form altrimenti il form non è valido --}}
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label sc-label">Titolo Post</label>
                    {{-- il name dell'input deve corrispondere al nome della colonna della tabella di riferimento --}}
                    <input type="text" id="name" name="title"
                    class="form-control"
                    placeholder="Titolo Post">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug"
                    name="slug"
                    class="form-control"
                    placeholder="Slug post" >
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea
                    class="form-control"
                    name="content" id="content" cols="30" rows="10"
                    placeholder="Content">
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>




    </div>

@endsection
