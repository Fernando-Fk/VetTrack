<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Mascota;
use App\Models\Veterinario;
use App\Models\Consulta;
use App\Models\Vacuna;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $propietarios = Propietario::where('user_id', $userId)->get();
        $propietariosCount = $propietarios->count();
        $mascotasCount = Mascota::whereIn('idPropietario', $propietarios->pluck('id'))->count();
        $consultasCount = Consulta::whereIn('idMascota', Mascota::whereIn('idPropietario', $propietarios->pluck('id'))->pluck('idMascota'))->count();
        $vacunasCount = Vacuna::whereIn('idMascota', Mascota::whereIn('idPropietario', $propietarios->pluck('id'))->pluck('idMascota'))->count();
        $veterinariosCount = Veterinario::count();

        return view('dashboard', compact('propietariosCount', 'mascotasCount', 'consultasCount', 'vacunasCount', 'veterinariosCount'));
    }
} 