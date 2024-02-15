@extends('layouts.admin')

@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Categorie</h1>
        <!--bottone per tornare alla lista Categorie-->
        <div class="ec-button">
            <!--bottone per di creare un nuovo categoria-->
            <a href="{{ route('admin.types.create') }}" class="btn btn-warning my-3">Nuova categoria</a>
            <!--/bottone per di creare un nuovo categoria-->
        </div>
        <!--bottone per tornare alla lista Categorie-->
    </header>
@endsection

@section('content')
    
    <!--mostra messaggio se si supera la validazione e l'azione viene eseguita-->
    @if (session('message'))
    {{ session('message') }}
    @endif
    <!--mostra messaggio se si supera la validazione e l'azione viene eseguita-->
    
    <!--tabella con popolamento dei dati del database-->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo categoria</th>
                <!--bottoni-->
                <th scope="col"></th>
                <!--/bottoni-->
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td >{{ $type->id }}</td>
                <td>{{ $type->title }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.types.show', $type) }}" class="btn btn-info" role="button">Dettaglio</a>
                    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-primary" role="button">Modifica</a>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline">
                        <!--token-->
                        @csrf
                        <!--/token-->
                        <!--method per cancellare-->
                        @method('DELETE')
                        <!--/method per cancellare-->
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--tabella con popolamento dei dati del database-->

@endsection