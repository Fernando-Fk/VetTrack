@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Vacuna</h1>
    <form action="{{ route('vacunas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idMascota" class="form-label">Mascota</label>
            <select name="idMascota" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($mascotas as $mascota)
                    <option value="{{ $mascota->idMascota }}">{{ $mascota->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Vacuna</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fecha_aplicacion" class="form-label">Fecha de Aplicación</label>
            <input type="date" name="fecha_aplicacion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fecha_proxima" class="form-label">Fecha Próxima</label>
            <input type="date" name="fecha_proxima" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('vacunas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 