@extends('layouts.admin')

@section('content')
    <div class="container d-flex flex-column">
        <h1>Titolo del progetto: {{ $project->title }}</h1>
        <div>
            <img class="show-img" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            <p> {{ $project->image_original_name }}</p>
        </div>
        {{-- rigiro la data nel formato italiano (giorno/mese/anno) --}}
        @php
            $date = date_create($project->date);
        @endphp
        <h4>Data di creazione: {{ date_format($date, 'd/m/Y') }}</h4>
        <p>Descrizione progetto: {{ $project->text }}</p>
    </div>
@endsection
