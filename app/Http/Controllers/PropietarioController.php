<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index()
    {
        $propietarios = \App\Models\Propietario::where('user_id', auth()->id())->get();
        return view('propietarios.index', compact('propietarios'));
    }

    public function create()
    {
        return view('propietarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $propietario = Propietario::create($data);
        return redirect()->route('propietarios.index')->with('success', 'Propietario creado correctamente');
    }

    public function show(Propietario $propietario)
    {
        return view('propietarios.show', compact('propietario'));
    }

    public function edit(Propietario $propietario)
    {
        return view('propietarios.edit', compact('propietario'));
    }

    public function update(Request $request, Propietario $propietario)
    {
        // Validación aquí cuando haya campos
        $propietario->update($request->all());
        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado correctamente');
    }

    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect()->route('propietarios.index')->with('success', 'Propietario eliminado correctamente');
    }
}
