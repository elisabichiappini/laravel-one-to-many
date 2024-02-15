@extends('layouts.admin')
    
@section('header_main')
    <header class="d-flex justify-content-between align-items-center">
       <h1>Tecnologia: {{ $technology->title }}</h1>
        <!--bottone per tornare alla lista technologies-->
        <div class="ec-button">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-info">Lista tecnologie</a>
        </div>
        <!--bottone per tornare alla lista technologies-->
    </header>
@endsection

