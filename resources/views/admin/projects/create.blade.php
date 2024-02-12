@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Nuovo progetto</h1>
        <!--bottone per tornare alla lista progetti-->
        <div class="ec-button">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Torna ai progetti</a>
        </div>
        <!--bottone per tornare alla lista progetti-->
    </header>
@endsection

@section('content')
    <!--mostra errori di validazione-->
    @include('partials.errors')
    <!--/mostra errori di validazione-->
    <!--form-->
    <form action="{{ route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        <!--token per validazione form-->
        @csrf
        <!--/token per validazione form-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="image_project" class="form-label">Carica immagine</label>
            <input class="form-control" type="file" id="image_project" name="project_img" value="{{ old('image_project') }}">
        </div>
        <div class="mb-3">
            <label for="born" class="form-label">Creato il</label>
            <input type="text" class="form-control" id="born" name="born" value="{{ old('born') }}">
        </div>
        <!--inline checkbox to technologies-->
        <div class="mb-3">
            @foreach ( $technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" value="{{ $technology->id }}">
                <label class="form-check-label" for="technology-{{ $technology->id}}">{{ $technology->title }}</label>
            </div>
            @endforeach
        </div>
        <!--inline checkbox-->
        <div class="mb-3">
            <label for="tools" class="form-label">Strumenti</label>
            <input type="text" class="form-control" id="tools" name="tools" value="{{ old('tools') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" value="{{ old('description') }}"></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Crea</button>
      </form>
    <!--form-->
@endsection