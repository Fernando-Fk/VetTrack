@extends('layouts.app')

@section('content')
<style>
    .dashboard-hero {
        background: linear-gradient(135deg, #43a047 0%, #a5d6a7 100%);
        color: #fff;
        border-radius: 18px;
        padding: 40px 30px 30px 30px;
        margin-bottom: 40px;
        box-shadow: 0 4px 24px rgba(67,160,71,0.15);
        text-align: center;
    }
    .dashboard-hero h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .dashboard-hero p {
        font-size: 1.2rem;
        opacity: 0.95;
    }
    .dashboard-card {
        border: none;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 2px 12px rgba(67,160,71,0.08);
        transition: transform 0.18s, box-shadow 0.18s;
        cursor: pointer;
        min-height: 220px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-decoration: none;
    }
    .dashboard-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(67,160,71,0.18);
        background: #e8f5e9;
        text-decoration: none;
    }
    .dashboard-card i {
        font-size: 3.5rem;
        color: #43a047;
        margin-bottom: 18px;
        transition: color 0.2s;
    }
    .dashboard-card:hover i {
        color: #2e7d32;
    }
    .dashboard-card h5 {
        color: #388e3c;
        font-weight: bold;
        margin-bottom: 8px;
    }
    .dashboard-card p {
        color: #555;
        font-size: 1.05rem;
    }
    .dashboard-footer {
        margin-top: 50px;
        text-align: center;
        color: #888;
        font-size: 1rem;
    }
    @media (max-width: 767px) {
        .dashboard-hero { padding: 25px 10px; }
        .dashboard-card { min-height: 180px; }
    }
</style>
<div class="container py-4">
    <div class="dashboard-hero">
        <h1>¡Hola, {{ Auth::user()->name ?? 'Usuario' }}!</h1>
        <p>Bienvenido al panel de VetTrack. Accede rápidamente a los módulos principales de tu veterinaria.</p>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-2 col-6">
            <div class="dashboard-card h-100">
                <i class="fa-solid fa-users"></i>
                <h5>Propietarios</h5>
                <p class="fs-3">{{ $propietariosCount }}</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="dashboard-card h-100">
                <i class="fa-solid fa-dog"></i>
                <h5>Mascotas</h5>
                <p class="fs-3">{{ $mascotasCount }}</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="dashboard-card h-100">
                <i class="fa-solid fa-user-md"></i>
                <h5>Veterinarios</h5>
                <p class="fs-3">{{ $veterinariosCount }}</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dashboard-card h-100">
                <i class="fa-solid fa-notes-medical"></i>
                <h5>Consultas</h5>
                <p class="fs-3">{{ $consultasCount }}</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dashboard-card h-100">
                <i class="fa-solid fa-syringe"></i>
                <h5>Vacunas</h5>
                <p class="fs-3">{{ $vacunasCount }}</p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card p-4">
                <h5 class="mb-3" style="color:#388e3c;">Resumen visual</h5>
                <canvas id="dashboardChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-4 col-12">
            <a href="{{ route('propietarios.index') }}" class="dashboard-card h-100">
                <i class="fa-solid fa-users"></i>
                <h5>Propietarios</h5>
                <p>Gestión de clientes y sus datos de contacto.</p>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="{{ route('mascotas.index') }}" class="dashboard-card h-100">
                <i class="fa-solid fa-dog"></i>
                <h5>Mascotas</h5>
                <p>Registra y gestiona todas las mascotas de tus clientes.</p>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="{{ route('veterinarios.index') }}" class="dashboard-card h-100">
                <i class="fa-solid fa-user-md"></i>
                <h5>Veterinarios</h5>
                <p>Gestión de veterinarios y sus especialidades.</p>
            </a>
        </div>
        <div class="col-md-6 col-12">
            <a href="{{ route('consultas.index') }}" class="dashboard-card h-100">
                <i class="fa-solid fa-notes-medical"></i>
                <h5>Consultas</h5>
                <p>Historial clínico y seguimiento de consultas veterinarias.</p>
            </a>
        </div>
        <div class="col-md-6 col-12">
            <a href="{{ route('vacunas.index') }}" class="dashboard-card h-100">
                <i class="fa-solid fa-syringe"></i>
                <h5>Vacunas</h5>
                <p>Control de vacunas y recordatorios automáticos.</p>
            </a>
        </div>
    </div>
    <div class="dashboard-footer">
        &copy; {{ date('Y') }} VetTrack. Plataforma para gestión veterinaria.<br>
        <span style="font-size:0.95em;">Desarrollado con <i class="fa-solid fa-heart" style="color:#43a047;"></i> para profesionales veterinarios.</span>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Propietarios', 'Mascotas', 'Veterinarios', 'Consultas', 'Vacunas'],
            datasets: [{
                label: 'Totales',
                data: [
                    {{ $propietariosCount }},
                    {{ $mascotasCount }},
                    {{ $veterinariosCount }},
                    {{ $consultasCount }},
                    {{ $vacunasCount }}
                ],
                backgroundColor: [
                    '#43a047',
                    '#388e3c',
                    '#81c784',
                    '#a5d6a7',
                    '#66bb6a'
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection
