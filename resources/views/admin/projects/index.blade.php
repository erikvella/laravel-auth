@extends('layouts.admin')

@section('content')
    <h1>elenco progetti</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome progetto</th>
                <th scope="col">Descrizione progetto</th>
                <th scope="col">Data rilascio del progetto</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>

                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->text }}</td>
                    <td>{{ $project->date }}</td>
                    <td><a class="btn btn-warning" href="{{ route('admin.projects.show', $project) }}">Dettagli progetto</a>
                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $projects->links() }}
@endsection
