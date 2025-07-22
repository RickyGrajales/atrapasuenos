<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    public function index()
    {
        return response()->json(Indicador::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'nombre_indicador' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'fecha_registro' => 'required|date',
        ]);

        $indicador = Indicador::create($validated);
        return response()->json($indicador, 201);
    }

    public function show($id)
    {
        $indicador = Indicador::with('nna')->findOrFail($id);
        return response()->json($indicador);
    }

    public function update(Request $request, $id)
    {
        $indicador = Indicador::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'nombre_indicador' => 'sometimes|required|string|max:100',
            'valor' => 'sometimes|required|numeric',
            'fecha_registro' => 'sometimes|required|date',
        ]);

        $indicador->update($validated);
        return response()->json($indicador);
    }

    public function destroy($id)
    {
        $indicador = Indicador::findOrFail($id);
        $indicador->delete();
        return response()->json(['message' => 'Indicador eliminado']);
    }
}
