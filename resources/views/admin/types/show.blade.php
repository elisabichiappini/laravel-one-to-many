@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
       <h1>Categoria progetto: {{ $type->title }}</h1>
        <!--bottone per tornare alla lista categorie-->
        <div class="ec-button">
            <a href="{{ route('admin.types.index') }}" class="btn btn-info">Lista categorie</a>
        </div>
        <!--bottone per tornare alla lista categorie-->
    </header>
@endsection

