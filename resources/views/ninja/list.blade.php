@extends('layouts.ninjas')

@section('title', $viewData['title'])

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg w-100" style="max-width: 1200px;">
        <div class="card-body">
            <div class="text-center my-4">
                <h1 class="display-4">Bienvenido al panel de Ninjas</h1>
                <a href="{{ route('ninja.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Crear Nuevo Ninja
                </a>
            </div>
            <!-- Card Grid Section -->
            <div class="row">
                @foreach ($viewData["ninjas"]->sortByDesc('chakra') as $ninja)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Card Image -->
                            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card" alt="Order Image">

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title font-weight-bold text-truncate" title="{{ $ninja->id }}">
                                    {{ $ninja->id }}
                                </h5>
                                <h5 class="card-title font-weight-bold text-truncate" title="{{ $ninja->nombre }}">
                                    {{ $ninja->nombre }}
                                </h5>
                                <h5 class="card-title font-weight-bold text-truncate" title="{{ $ninja->chakra }}">
                                    <!-- Cambiar el color del chakra según la aldea -->
                                    <span style="color: {{ $ninja->aldea == 'Hoja' ? 'red' : 'blue' }};">
                                        {{ $ninja->chakra }}
                                    </span>
                                </h5>
                                <h5 class="card-title font-weight-bold text-truncate" title="{{ $ninja->aldea }}">
                                    {{ $ninja->aldea }}
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection