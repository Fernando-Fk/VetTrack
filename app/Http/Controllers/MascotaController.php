<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Propietario;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $mascotas = $propietario ? \App\Models\Mascota::where('idPropietario', $propietario->id)->get() : collect();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        $propietarios = Propietario::all();
        return view('mascotas.create', compact('propietarios'));
    }

    public function store(Request $request)
    {
        $propietario = \App\Models\Propietario::where('user_id', auth()->id())->first();
        $data = $request->all();
        if ($propietario) {
            $data['idPropietario'] = $propietario->id;
        }
        Mascota::create($data);
        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente');
    }

    public function show(Mascota $mascota)
    {
        $mascota->load('propietario');
        return view('mascotas.show', compact('mascota'));
    }

    public function edit(Mascota $mascota)
    {
        $propietarios = Propietario::all();
        return view('mascotas.edit', compact('mascota', 'propietarios'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente');
    }

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente');
    }
} 