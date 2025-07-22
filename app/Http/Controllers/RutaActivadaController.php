<?php

namespace App\Http\Controllers;

use App\Models\RutaActivada;
use Illuminate\Http\Request;

class RutaActivadaController extends Controller
{
    public function index()
    {
        return response()->json(RutaActivada::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'tipo_ruta' => 'required|string|max:100',
            'fecha_activacion' => 'required|date',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $ruta = RutaActivada::create($validated);
        return response()->json($ruta, 201);
    }

    public function show($id)
    {
        $ruta = RutaActivada::with('nna')->findOrFail($id);
        return response()->json($ruta);
    }

    public function update(Request $request, $id)
    {
        $ruta = RutaActivada::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'tipo_ruta' => 'sometimes|required|string|max:100',
            'fecha_activacion' => 'sometimes|required|date',
            'estado' => 'sometimes|required|string|max:50',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $ruta->update($validated);
        return response()->json($ruta);
    }

    public function destroy($id)
    {
        $ruta = RutaActivada::findOrFail($id);
        $ruta->delete();
        return response()->json(['message' => 'Ruta eliminada']);
    }
}
