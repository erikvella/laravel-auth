@extends('layouts.admin')

@section('content')
    <h1>elenco categorie</h1>

    <form action="{{ route('admin.tecnologies.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nuova tecnologia" name="name">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Aggiungi</button>
        </div>
    </form>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome tecnologia</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tecnologies as $tecnology)
                <tr>

                    <td>{{ $tecnology->id }}</td>
                    <td>{{ $tecnology->name }}</td>
                    <td>
                        <form action="{{ route('admin.tecnologies.destroy', $tecnology) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">

                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Elimina dall'elenco</button>
                        </form>
                    </td>


                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
