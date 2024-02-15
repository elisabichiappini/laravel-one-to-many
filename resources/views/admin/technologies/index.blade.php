@extends('layouts.admin')

@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Tecnologie</h1>
        <!--bottone per tornare alla lista tecnologie-->
        <div class="ec-button">
            <!--bottone per di creare un nuovo tecnologia-->
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-warning my-3">Nuova Tecnologia</a>
            <!--/bottone per di creare un nuovo progetto-->
        </div>
        <!--bottone per tornare alla lista tecnologie-->
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
                <th scope="col">Nome Tecnologia</th>
                <!--bottoni-->
                <th scope="col"></th>
                <!--/bottoni-->
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr>
                <td >{{ $technology->id }}</td>
                <td>{{ $technology->title }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-info" role="button">Dettaglio</a>
                    <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-primary" role="button">Modifica</a>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="d-inline">
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