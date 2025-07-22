<?php

namespace App\Http\Controllers;

use App\Models\InstitucionAliada;
use Illuminate\Http\Request;

class InstitucionAliadaController extends Controller
{
    public function index()
    {
        return response()->json(InstitucionAliada::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
        ]);

        $institucion = InstitucionAliada::create($validated);
        return response()->json($institucion, 201);
    }

    public function show($id)
    {
        $institucion = InstitucionAliada::findOrFail($id);
        return response()->json($institucion);
    }

    public function update(Request $request, $id)
    {
        $institucion = InstitucionAliada::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
        ]);

        $institucion->update($validated);
        return response()->json($institucion);
    }

    public function destroy($id)
    {
        $institucion = InstitucionAliada::findOrFail($id);
        $institucion->delete();

        return response()->json(['message' => 'Institución eliminada']);
    }
}
