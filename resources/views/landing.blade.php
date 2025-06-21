<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetTrack - Tu veterinaria digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #a5d6a7 100%);
            min-height: 100vh;
        }
        .navbar {
            background-color: #388e3c !important;
        }
        .navbar-brand, .nav-link, .navbar-nav .nav-link.active {
            color: #fff !important;
        }
        .hero {
            padding: 60px 0 40px 0;
            text-align: center;
        }
        .hero-title {
            color: #388e3c;
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-desc {
            color: #2e7d32;
            font-size: 1.3rem;
            margin-bottom: 30px;
        }
        .icon-section i {
            color: #43a047;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .icon-section h5 {
            color: #388e3c;
        }
        .btn-main {
            background: #43a047;
            color: #fff;
            border-radius: 30px;
            padding: 12px 32px;
            font-size: 1.1rem;
        }
        .btn-main:hover {
            background: #2e7d32;
            color: #fff;
        }
        footer {
            background: #388e3c;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-paw"></i> VetTrack</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Ingresar</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <h1 class="hero-title">Bienvenido a VetTrack</h1>
        <p class="hero-desc">La plataforma digital para gestionar tu veterinaria de forma fácil, rápida y segura.<br>Controla propietarios, mascotas, consultas, vacunas y mucho más.</p>
        <a href="/login" class="btn btn-main">Acceder al sistema</a>
    </div>
</section>

<section class="container my-5" id="servicios">
    <div class="row text-center icon-section">
        <div class="col-md-3">
            <i class="fa-solid fa-dog"></i>
            <h5>Mascotas</h5>
            <p>Registra y gestiona todas las mascotas de tus clientes.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-user-md"></i>
            <h5>Consultas</h5>
            <p>Historial clínico y seguimiento de consultas veterinarias.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-syringe"></i>
            <h5>Vacunas</h5>
            <p>Control de vacunas y recordatorios automáticos.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-users"></i>
            <h5>Propietarios</h5>
            <p>Gestión completa de clientes y sus datos de contacto.</p>
        </div>
    </div>
</section>

<section class="container my-5" id="contacto">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4" style="color:#388e3c;">¿Listo para digitalizar tu veterinaria?</h2>
            <p>Contáctanos para más información o solicita una demo personalizada.</p>
            <a href="mailto:info@vettrack.com" class="btn btn-main"><i class="fa-solid fa-envelope"></i> Contactar</a>
        </div>
    </div>
</section>

<footer>
    &copy; {{ date('Y') }} VetTrack. Todos los derechos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 