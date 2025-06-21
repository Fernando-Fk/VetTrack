@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Propietario</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $propietario->id }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $propietario->nombre }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $propietario->direccion }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $propietario->telefono }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $propietario->email }}</li>
        <li class="list-group-item"><strong>Creado:</strong> {{ $propietario->created_at }}</li>
        <li class="list-group-item"><strong>Actualizado:</strong> {{ $propietario->updated_at }}</li>
    </ul>
    <a href="{{ route('propietarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection 