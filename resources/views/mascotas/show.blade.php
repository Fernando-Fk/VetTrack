@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Mascota</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $mascota->idMascota }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $mascota->nombre }}</li>
        <li class="list-group-item"><strong>Especie:</strong> {{ $mascota->especie }}</li>
        <li class="list-group-item"><strong>Raza:</strong> {{ $mascota->raza }}</li>
        <li class="list-group-item"><strong>Edad:</strong> {{ $mascota->edad }}</li>
        <li class="list-group-item"><strong>Propietario:</strong> {{ $mascota->propietario->nombre ?? '' }}</li>
    </ul>
    <a href="{{ route('mascotas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection 