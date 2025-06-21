@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Vacuna</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $vacuna->idVacuna }}</li>
        <li class="list-group-item"><strong>Mascota:</strong> {{ $vacuna->mascota->nombre ?? '' }}</li>
        <li class="list-group-item"><strong>Nombre de la Vacuna:</strong> {{ $vacuna->nombre }}</li>
        <li class="list-group-item"><strong>Fecha de Aplicación:</strong> {{ $vacuna->fecha_aplicacion }}</li>
        <li class="list-group-item"><strong>Fecha Próxima:</strong> {{ $vacuna->fecha_proxima }}</li>
    </ul>
    <a href="{{ route('vacunas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection 