@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Nuovo Categoria</h1>
        <!--bottone per tornare alla lista types-->
        <div class="ec-button">
            <a href="{{ route('admin.types.index') }}" class="btn btn-info">Lista categorie</a>
        </div>
        <!--bottone per tornare alla lista types-->
    </header>
@endsection

@section('content')
    <!--mostra errori di validazione-->
    @include('partials.errors')
    <!--/mostra errori di validazione-->
    <!--form-->
    <form action="{{ route('admin.types.store')}}" method="POST">
        <!--token per validazione form-->
        @csrf
        <!--/token per validazione form-->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo nuova categoria</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>
        <button type="submit" class="btn btn-warning">Crea</button>
      </form>
    <!--form-->
@endsection