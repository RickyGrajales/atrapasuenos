<?php

namespace App\Http\Controllers;

use App\Models\Nna;
use Illuminate\Http\Request;

class NnaController extends Controller
{
    public function index()
    {
       $nnas = Nna::all();
    return view('nna.index', compact('nnas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'documento_identidad' => 'required|string|unique:nnas,documento_identidad|max:20',
            'genero' => 'required|in:masculino,femenino,otro',
            'grupo_etnico' => 'nullable|string|max:100', // ✅ NUEVO
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'discapacidad' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $nna = Nna::create($validated);
        return redirect()->route('nna.create')->with('success', 'NNA registrado correctamente');
    }

    public function show($id)
    {
        $nna = Nna::findOrFail($id);
        return response()->json($nna);
    }

    public function update(Request $request, $id)
    {
        $nna = Nna::findOrFail($id);

        $validated = $request->validate([
            'nombres' => 'sometimes|required|string|max:100',
            'apellidos' => 'sometimes|required|string|max:100',
            'fecha_nacimiento' => 'sometimes|required|date',
            'documento_identidad' => 'sometimes|required|string|max:20|unique:nnas,documento_identidad,' . $nna->id,
            'genero' => 'sometimes|required|in:masculino,femenino,otro',
            'grupo_etnico' => 'nullable|string|max:100', // ✅ NUEVO
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'discapacidad' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $nna->update($validated);
       return redirect()->route('nna.index')->with('success', 'NNA actualizado correctamente');
    }

    public function destroy($id)
    {
        $nna = Nna::findOrFail($id);
        $nna->delete();
        return redirect()->route('nna.index')->with('success', 'NNA eliminado correctamente');
    }

    public function create()
    {
        return view('nna.create');
    }

    public function edit($id)
{
    $nna = Nna::findOrFail($id);
    return view('nna.edit', compact('nna'));
}

}
