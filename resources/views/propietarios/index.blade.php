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
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .crud-nav a {
        background: #43a047;
        color: #fff;
        border-radius: 8px;
        padding: 8px 18px;
        font-weight: bold;
        text-decoration: none;
        transition: background 0.2s;
    }
    .crud-nav a:hover {
        background: #2e7d32;
        color: #fff;
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
        <h1>Propietarios</h1>
        <a href="{{ route('propietarios.create') }}" class="btn btn-success">Crear Propietario</a>
    </div>
    <div class="crud-nav">
        <a href="/dashboard" class="btn btn-success">CRUD</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($propietarios as $propietario)
                    <tr>
                        <td>{{ $propietario->idPropietario ?? $propietario->id }}</td>
                        <td>{{ $propietario->nombre }}</td>
                        <td>{{ $propietario->direccion }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>{{ $propietario->email ?? '-' }}</td>
                        <td>{{ $propietario->created_at ?? '-' }}</td>
                        <td>{{ $propietario->updated_at ?? '-' }}</td>
                        <td>
                            <a href="{{ route('propietarios.show', $propietario) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('propietarios.edit', $propietario) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('propietarios.destroy', $propietario) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty-msg">No hay propietarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 