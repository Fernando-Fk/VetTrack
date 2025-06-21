@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Mascota</h1>
    <form action="{{ route('mascotas.update', $mascota) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $mascota->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <input type="text" name="especie" class="form-control" value="{{ old('especie', $mascota->especie) }}" required>
        </div>
        <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input type="text" name="raza" class="form-control" value="{{ old('raza', $mascota->raza) }}" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ old('edad', $mascota->edad) }}" required>
        </div>
        <div class="mb-3">
            <label for="idPropietario" class="form-label">Propietario</label>
            <select name="idPropietario" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->idPropietario }}" @if($mascota->idPropietario == $propietario->idPropietario) selected @endif>{{ $propietario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 