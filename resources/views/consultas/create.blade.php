@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Consulta</h1>
    <form action="{{ route('consultas.store') }}" method="POST">
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
            <label for="idVeterinario" class="form-label">Veterinario</label>
            <select name="idVeterinario" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($veterinarios as $veterinario)
                    <option value="{{ $veterinario->idVeterinario }}">{{ $veterinario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hora_atencion" class="form-label">Hora de Atención</label>
            <input type="time" name="hora_atencion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <textarea name="diagnostico" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tratamiento" class="form-label">Tratamiento</label>
            <textarea name="tratamiento" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 