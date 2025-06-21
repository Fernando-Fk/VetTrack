<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        if (!$propietario) {
            return view('consultas.index', ['consultas' => collect()]);
        }
        $mascotasIds = \App\Models\Mascota::where('idPropietario', $propietario->id)->pluck('idMascota');
        $consultas = \App\Models\Consulta::whereIn('idMascota', $mascotasIds)->with(['mascota', 'veterinario'])->get();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $mascotas = $propietario ? \App\Models\Mascota::where('idPropietario', $propietario->id)->get() : collect();
        $veterinarios = \App\Models\Veterinario::all();
        return view('consultas.create', compact('mascotas', 'veterinarios'));
    }

    public function store(Request $request)
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $mascota = \App\Models\Mascota::where('idMascota', $request->idMascota)->where('idPropietario', $propietario ? $propietario->id : null)->first();
        if (!$mascota) {
            return redirect()->route('consultas.index')->with('error', 'Mascota no válida para este usuario');
        }
        \App\Models\Consulta::create($request->all());
        return redirect()->route('consultas.index')->with('success', 'Consulta creada correctamente');
    }

    public function show(Consulta $consulta)
    {
        $consulta->load(['mascota', 'veterinario']);
        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        $mascotas = Mascota::all();
        $veterinarios = Veterinario::all();
        return view('consultas.edit', compact('consulta', 'mascotas', 'veterinarios'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $consulta->update($request->all());
        return redirect()->route('consultas.index')->with('success', 'Consulta actualizada correctamente');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')->with('success', 'Consulta eliminada correctamente');
    }
} 