@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Consulta</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $consulta->idConsulta }}</li>
        <li class="list-group-item"><strong>Mascota:</strong> {{ $consulta->mascota->nombre ?? '' }}</li>
        <li class="list-group-item"><strong>Veterinario:</strong> {{ $consulta->veterinario->nombre ?? '' }}</li>
        <li class="list-group-item"><strong>Fecha:</strong> {{ $consulta->fecha }}</li>
        <li class="list-group-item"><strong>Hora de Atención:</strong> {{ $consulta->hora_atencion }}</li>
        <li class="list-group-item"><strong>Diagnóstico:</strong> {{ $consulta->diagnostico }}</li>
        <li class="list-group-item"><strong>Tratamiento:</strong> {{ $consulta->tratamiento }}</li>
    </ul>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection 