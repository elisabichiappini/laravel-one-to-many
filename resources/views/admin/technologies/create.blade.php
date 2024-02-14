@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Nuovo Tecnologia</h1>
        <!--bottone per tornare alla lista technologies-->
        <div class="ec-button">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-info">Torna alla lista tecnologie</a>
        </div>
        <!--bottone per tornare alla lista technologies-->
    </header>
@endsection

@section('content')
    <!--mostra errori di validazione-->
    @include('partials.errors')
    <!--/mostra errori di validazione-->
    <!--form-->
    <form action="{{ route('admin.technologies.store')}}" method="POST">
        <!--token per validazione form-->
        @csrf
        <!--/token per validazione form-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>
        
        {{-- <!--inline checkbox to technologies-->
        <div class="mb-3">
            @foreach ( $technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} >
                <label class="form-check-label" for="technology-{{ $technology->id}}">{{ $technology->title }}</label>
            </div>
            @endforeach
        </div>
        <!--inline checkbox to technologies--> --}}
        <button type="submit" class="btn btn-warning">Crea</button>
      </form>
    <!--form-->
@endsection