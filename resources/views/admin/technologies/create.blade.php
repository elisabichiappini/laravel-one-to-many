@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Nuovo Tecnologia</h1>
        <!--bottone per tornare alla lista technologies-->
        <div class="ec-button">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-info">Torna ai technologies</a>
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
        <button type="submit" class="btn btn-warning">Crea</button>
      </form>
    <!--form-->
@endsection