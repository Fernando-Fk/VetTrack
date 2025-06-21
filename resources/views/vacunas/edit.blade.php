@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vacuna</h1>
    <form action="{{ route('vacunas.update', $vacuna) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idMascota" class="form-label">Mascota</label>
            <select name="idMascota" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($mascotas as $mascota)
                    <option value="{{ $mascota->idMascota }}" @if($vacuna->idMascota == $mascota->idMascota) selected @endif>{{ $mascota->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Vacuna</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $vacuna->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_aplicacion" class="form-label">Fecha de Aplicación</label>
            <input type="date" name="fecha_aplicacion" class="form-control" value="{{ old('fecha_aplicacion', $vacuna->fecha_aplicacion) }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_proxima" class="form-label">Fecha Próxima</label>
            <input type="date" name="fecha_proxima" class="form-control" value="{{ old('fecha_proxima', $vacuna->fecha_proxima) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('vacunas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 