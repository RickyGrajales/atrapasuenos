<?php

namespace App\Http\Controllers;

use App\Models\ResponsabilidadIcbf;
use Illuminate\Http\Request;

class ResponsabilidadIcbfController extends Controller
{
    public function index()
    {
        return response()->json(ResponsabilidadIcbf::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'fecha_ingreso' => 'required|date',
            'medida_proteccion' => 'required|string|max:150',
            'entidad_remisora' => 'required|string|max:150',
            'observaciones' => 'nullable|string',
        ]);

        $registro = ResponsabilidadIcbf::create($validated);
        return response()->json($registro, 201);
    }

    public function show($id)
    {
        $registro = ResponsabilidadIcbf::with('nna')->findOrFail($id);
        return response()->json($registro);
    }

    public function update(Request $request, $id)
    {
        $registro = ResponsabilidadIcbf::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'fecha_ingreso' => 'sometimes|required|date',
            'medida_proteccion' => 'sometimes|required|string|max:150',
            'entidad_remisora' => 'sometimes|required|string|max:150',
            'observaciones' => 'nullable|string',
        ]);

        $registro->update($validated);
        return response()->json($registro);
    }

    public function destroy($id)
    {
        $registro = ResponsabilidadIcbf::findOrFail($id);
        $registro->delete();
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }
}
