@extends('layouts.admin')

@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Progetti portfolio</h1>
        <!--bottone per tornare alla lista progetti-->
        <div class="ec-button">
            <!--bottone per di creare un nuovo progetto-->
            <a href="{{ route('admin.projects.create') }}" class="btn btn-warning my-3">Nuovo progetto</a>
            <!--/bottone per di creare un nuovo progetto-->
        </div>
        <!--bottone per tornare alla lista progetti-->
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
                <th scope="col">Nome progetto</th>
                <th scope="col">Immagine</th>
                <th scope="col">Data creazione</th>
                <!--bottoni-->
                <th scope="col"></th>
                <!--/bottoni-->
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td >{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>
                    @if ($project->project_img)
                    <span class="badge text-bg-success">Allegato</span>
                    @endif
                </td>
                <td>{{ $project->born }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info" role="button">Dettaglio</a>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary" role="button">Modifica</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
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