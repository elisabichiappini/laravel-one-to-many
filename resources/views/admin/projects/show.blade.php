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
    <h6>{{ $project->born }}</h6>
    <h3>{{ $project->tools }} </h3>
    <p>{{ $project->description}}</p>
    <span class="badge text-bg-success">
        Tipologia: {{ $project->type->title }}
    </span>


    @if ($project->project_img)
        <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->title }}">
    @endif
    <!--elementi in vista del singolo progetto-->
@endsection