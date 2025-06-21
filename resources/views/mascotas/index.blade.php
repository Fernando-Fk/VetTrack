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
        <h1>Mascotas</h1>
        <a href="{{ route('mascotas.create') }}" class="btn btn-success">Crear Mascota</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->idMascota }}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->especie }}</td>
                        <td>{{ $mascota->raza }}</td>
                        <td>{{ $mascota->edad }}</td>
                        <td>{{ $mascota->propietario->nombre ?? '' }}</td>
                        <td>
                            <a href="{{ route('mascotas.show', $mascota) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-msg">No hay mascotas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 