@extends('layouts.orders')

@section('title', 'Panel de Orders')

@section('content')
    <div class="text-center my-4">
        <h1>Bienvenido al panel de Orders</h1>
        <a href="{{ route('order.create') }}" class="btn btn-primary">Crear</a>
        <a href="{{ route('order.list') }}" class="btn btn-primary">Lista</a>
    </div>
@endsection
