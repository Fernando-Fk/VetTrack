@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Mascota</h1>
    <form action="{{ route('mascotas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <input type="text" name="especie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input type="text" name="raza" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control" required>
        </div>
        <div class="mb-3" style="display:none;">
            <label for="idPropietario" class="form-label">Propietario</label>
            <select name="idPropietario" class="form-control">
                <option value="">Seleccione...</option>
                @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->idPropietario }}">{{ $propietario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 