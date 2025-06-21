@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Veterinario</h1>
    <form action="{{ route('veterinarios.update', $veterinario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $veterinario->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $veterinario->correo) }}" required>
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $veterinario->especialidad) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('veterinarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 