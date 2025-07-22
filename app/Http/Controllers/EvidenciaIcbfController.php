<?php

namespace App\Http\Controllers;

use App\Models\EvidenciaIcbf;
use Illuminate\Http\Request;

class EvidenciaIcbfController extends Controller
{
    public function index()
    {
        return response()->json(EvidenciaIcbf::with('responsabilidad')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'archivo' => 'required|string|max:255', // Se espera que envíes la ruta del archivo ya subida
            'fecha' => 'required|date',
            'responsabilidad_id' => 'required|exists:responsabilidad_icbfs,id',
        ]);

        $evidencia = EvidenciaIcbf::create($validated);
        return response()->json($evidencia, 201);
    }

    public function show($id)
    {
        $evidencia = EvidenciaIcbf::with('responsabilidad')->findOrFail($id);
        return response()->json($evidencia);
    }

    public function update(Request $request, $id)
    {
        $evidencia = EvidenciaIcbf::findOrFail($id);

        $validated = $request->validate([
            'descripcion' => 'sometimes|required|string|max:255',
            'archivo' => 'sometimes|required|string|max:255',
            'fecha' => 'sometimes|required|date',
            'responsabilidad_id' => 'sometimes|required|exists:responsabilidad_icbfs,id',
        ]);

        $evidencia->update($validated);
        return response()->json($evidencia);
    }

    public function destroy($id)
    {
        $evidencia = EvidenciaIcbf::findOrFail($id);
        $evidencia->delete();
        return response()->json(['message' => 'Evidencia eliminada']);
    }
}
