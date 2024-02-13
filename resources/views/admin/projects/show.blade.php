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
        <h5>Categoria: </h5>
        <span class="badge text-bg-info">
            {{ $project->type?->title ?: 'Nessuna categoria' }}
        </span>
    </div>
    <!--/elemento type-->
    <!--elemento tecnologia-->
    <div>
       <h5>Tags: </h5>
        @forelse ( $project->technologies as $technology )
            <span class="badge text-bg-warning">{{ $technology->title }}</span>
        @empty 
            <span class="badge text-bg-warning">Nessuna tech attribuita</span>
        @endforelse
    </div>
    <!--/elemento tecnologia-->
    <h6>{{ $project->born }}</h6>
    <p>{{ $project->description}}</p>
    @if ($project->project_img)
        <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->title }}">
    @endif
    <!--elementi in vista del singolo progetto-->

    
@endsection