@extends('layouts.ninjas')

@section('title', 'Estadísticas de Ninjas')

@section('content')
<div class="container">
    <h1 class="my-4">Estadísticas de Ninjas</h1>

    <!-- Estadísticas por aldea -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Ninjas por Aldea</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach ($stats as $stat)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $stat->aldea }}
                        <span class="badge bg-primary rounded-pill">{{ $stat->total }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Suma total de chakras -->
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="card-title mb-0">Suma Total de Chakras</h5>
        </div>
        <div class="card-body">
            <p class="lead">El total de chakras de todos los ninjas es: <strong>{{ $totalChakra }}</strong></p>
        </div>
    </div>
</div>
@endsection