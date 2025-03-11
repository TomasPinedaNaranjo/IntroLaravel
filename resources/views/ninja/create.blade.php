@extends('layouts.ninjas')

@section('title', $viewData['title'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <!-- Card Header -->
            <div class="card-header text-white text-center py-4">
                <h4 class="mb-0">Creación de Ninjas</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Order Form -->
                <form method="POST" action="{{ route('ninja.save') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre del Ninja</label>
                        <input type="text" id="nombre" class="form-control" placeholder="Nombre del ninja" name="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="aldea" class="form-label">Aldea</label>
                        <select id="aldea" class="form-select" name="aldea" required>
                            <option value="" disabled selected>Selecciona una aldea</option>
                            <option value="Hoja" {{ old('aldea') == 'Hoja' ? 'selected' : '' }}>Hoja</option>
                            <option value="Niebla" {{ old('aldea') == 'Niebla' ? 'selected' : '' }}>Niebla</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="chakra" class="form-label">Chakra</label>
                        <input type="number" id="chakra" class="form-control" placeholder="Ingresa el nivel de chakra" name="chakra" value="{{ old('chakra') }}" required min="0">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg w-100 py-2">Crear Ninja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection