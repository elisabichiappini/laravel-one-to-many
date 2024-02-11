@extends('layouts.admin')

@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Modifica progetto</h1>
        <!--bottone per tornare alla lista progetti-->
        <div class="ec-button">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna ai progetti</a>
        </div>
        <!--bottone per tornare alla lista progetti-->
    </header>
@endsection

@section('content')
    <!--mostra errori di validazione in variabile di sessione-->
    @include('partials.errors')
    <!--/mostra errori di validazione in variabile di sessione-->
    <!--form-->
    <form action="{{ route('admin.projects.update', $project)}}" method="POST">
        <!--token per validazione form-->
        @csrf
        <!--/token per validazione form-->
        @method('PUT')
        <!--corpo form-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label for="project_img" class="form-label">Carica immagine</label>
            <input class="form-control" type="file" id="project_img" name="project_img" value="{{ old('project_img', $project->project_img) }}">
        </div>
        <div class="mb-3">
            <label for="born" class="form-label">Creato il</label>
            <input type="text" class="form-control" id="born" name="born" value="{{ old('born', $project->born) }}">
        </div>
        <div class="mb-3">
            <label for="tools" class="form-label">Strumenti</label>
            <input type="text" class="form-control" id="tools" name="tools" value="{{ old('tools', $project->tools) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="5" name="description">{{ old('description', $project->description) }}"</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
    <!--corpo form-->
    <!--form-->
@endsection