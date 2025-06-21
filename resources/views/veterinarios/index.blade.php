@extends('layouts.app')

@section('content')
<style>
    .crud-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }
    .crud-header h1 {
        color: #388e3c;
        font-weight: bold;
        margin: 0;
    }
    .crud-nav {
        margin-bottom: 24px;
    }
    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(67,160,71,0.08);
        background: #fff;
    }
    .table th {
        background: #e8f5e9;
        color: #388e3c;
        font-weight: bold;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .empty-msg {
        text-align: center;
        color: #888;
        font-size: 1.1rem;
        margin: 40px 0;
    }
</style>
<div class="container py-4">
    <div class="crud-header">
        <h1>Veterinarios</h1>
        <a href="{{ route('veterinarios.create') }}" class="btn btn-success">Crear Veterinario</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($veterinarios as $veterinario)
                    <tr>
                        <td>{{ $veterinario->idVeterinario }}</td>
                        <td>{{ $veterinario->nombre }}</td>
                        <td>{{ $veterinario->correo }}</td>
                        <td>{{ $veterinario->especialidad }}</td>
                        <td>
                            <a href="{{ route('veterinarios.show', $veterinario) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('veterinarios.edit', $veterinario) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('veterinarios.destroy', $veterinario) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-msg">No hay veterinarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 