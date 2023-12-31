@extends('layouts.admin')

@section('content')
    <div class="container d-flex flex-column">
        <h1>{{ $title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="container my-5">


            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf : elemento da inserire in tutti i form in laravel per controllo di sicurezza --}}
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="title" class="form-label">TItolo progetto *</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $project?->title) }}">

                </div>

                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image"
                        value="{{ old('image', $project?->image) }}">

                </div>
                {{-- @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
                @if ($project)
                    <img width="120" src="{{ asset('storage/' . $project->image) }}">
                @endif
                <div class="form-floating my-5">
                    <textarea for="text" class="form-control" placeholder="Scrivi la descrizione" id="text" name="text"
                        style="height: 100px"> {{ old('text', $project?->text) }}</textarea>
                    <label>
                        Scrivi la descrizione del progetto *
                    </label>

                </div>



                <button type="submit" class="btn btn-success my-3 ">Invia</button>
                <button type="reset" class="btn btn-danger my-3 ">Cancella tutto</button>


            </form>


        </div>
    </div>

@endsection
