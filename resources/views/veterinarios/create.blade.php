@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Veterinario</h1>
    <form action="{{ route('veterinarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" name="especialidad" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('veterinarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 