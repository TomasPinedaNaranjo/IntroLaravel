@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <div class="text-center my-4">
        <h1>Bienvenido al panel de Ninjas</h1>
        <a href="{{ route('ninja.create') }}" class="btn btn-primary">Crear</a>
        <a href="{{ route('ninja.list') }}" class="btn btn-primary">Lista</a>
        <a href="{{ route('ninja.stats') }}" class="btn btn-primary">Estadísticas</a>
    </div>
@endsection
