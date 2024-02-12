@extends('layouts.admin')

@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Dettaglio</h1>
        <!--bottone per tornare alla lista progetti-->
        <div class="ec-button">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna ai progetti</a>
            {{-- <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Modifica</a> --}}
        </div>
        <!--bottone per tornare alla lista progetti-->
    </header>
@endsection

@section('content')
    <!--elementi in vista del singolo progetto-->
    <h2>{{ $project->title }}</h2>
    <!--elemento type-->
    <div>
        <span class="badge text-bg-info">
            Categoria: {{ $project->type?->title ?: 'Nessuna categoria' }}
        </span>
    </div>
    <!--/elemento type-->
    <!--elemento tecnologia-->
    <div>
        <h5>Tags</h5>
        <ul>   
            @foreach ( $project->technologies as $technology )
            <li>
                @if($technology) 
                <span class="badge text-bg-warning">{{ $technology->title }}</span>
                @else 
                <span class="badge text-bg-danger">Nessuna tecnologia attribuita</span>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <!--/elemento tecnologia-->
    <h6>{{ $project->born }}</h6>
    <h3>{{ $project->tools }} </h3>
    
    <p>{{ $project->description}}</p>
    @if ($project->project_img)
        <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->title }}">
    @endif
    <!--elementi in vista del singolo progetto-->

    
@endsection