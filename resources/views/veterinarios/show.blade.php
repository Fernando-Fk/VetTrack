@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Veterinario</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $veterinario->idVeterinario }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $veterinario->nombre }}</li>
        <li class="list-group-item"><strong>Correo:</strong> {{ $veterinario->correo }}</li>
        <li class="list-group-item"><strong>Especialidad:</strong> {{ $veterinario->especialidad }}</li>
    </ul>
    <a href="{{ route('veterinarios.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection 