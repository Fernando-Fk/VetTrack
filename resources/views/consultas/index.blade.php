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
        <h1>Consultas</h1>
        <a href="{{ route('consultas.create') }}" class="btn btn-success">Crear Consulta</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mascota</th>
                    <th>Veterinario</th>
                    <th>Fecha</th>
                    <th>Hora Atención</th>
                    <th>Diagnóstico</th>
                    <th>Tratamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->idConsulta }}</td>
                        <td>{{ $consulta->mascota->nombre ?? '' }}</td>
                        <td>{{ $consulta->veterinario->nombre ?? '' }}</td>
                        <td>{{ $consulta->fecha }}</td>
                        <td>{{ $consulta->hora_atencion }}</td>
                        <td>{{ $consulta->diagnostico }}</td>
                        <td>{{ $consulta->tratamiento }}</td>
                        <td>
                            <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('consultas.destroy', $consulta) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-msg">No hay consultas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 