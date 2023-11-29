@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    {{-- rigiro la data nel formato italiano (giorno/mese/anno) --}}
    @php
        $date = date_create($project->date);
    @endphp
    <h4>Data di creazione: {{ date_format($date, 'd/m/Y') }}</h4>
    <p>Descrizione progetto: {{ $project->text }}</p>
@endsection
