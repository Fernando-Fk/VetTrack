<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use App\Models\Mascota;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    public function index()
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        if (!$propietario) {
            return view('vacunas.index', ['vacunas' => collect()]);
        }
        $mascotasIds = \App\Models\Mascota::where('idPropietario', $propietario->id)->pluck('idMascota');
        $vacunas = \App\Models\Vacuna::whereIn('idMascota', $mascotasIds)->with('mascota')->get();
        return view('vacunas.index', compact('vacunas'));
    }

    public function create()
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $mascotas = $propietario ? \App\Models\Mascota::where('idPropietario', $propietario->id)->get() : collect();
        return view('vacunas.create', compact('mascotas'));
    }

    public function store(Request $request)
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $mascota = \App\Models\Mascota::where('idMascota', $request->idMascota)->where('idPropietario', $propietario ? $propietario->id : null)->first();
        if (!$mascota) {
            return redirect()->route('vacunas.index')->with('error', 'Mascota no válida para este usuario');
        }
        \App\Models\Vacuna::create($request->all());
        return redirect()->route('vacunas.index')->with('success', 'Vacuna creada correctamente');
    }

    public function show(Vacuna $vacuna)
    {
        $vacuna->load('mascota');
        return view('vacunas.show', compact('vacuna'));
    }

    public function edit(Vacuna $vacuna)
    {
        $mascotas = Mascota::all();
        return view('vacunas.edit', compact('vacuna', 'mascotas'));
    }

    public function update(Request $request, Vacuna $vacuna)
    {
        $vacuna->update($request->all());
        return redirect()->route('vacunas.index')->with('success', 'Vacuna actualizada correctamente');
    }

    public function destroy(Vacuna $vacuna)
    {
        $vacuna->delete();
        return redirect()->route('vacunas.index')->with('success', 'Vacuna eliminada correctamente');
    }
} 