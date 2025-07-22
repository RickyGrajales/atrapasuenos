<?php

namespace App\Http\Controllers;

use App\Models\ValoracionPsicosocial;
use Illuminate\Http\Request;

class ValoracionPsicosocialController extends Controller
{
    public function index()
    {
        return response()->json(ValoracionPsicosocial::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'fecha_valoracion' => 'required|date',
            'profesional' => 'required|string|max:100',
            'tipo_valoracion' => 'required|string|max:100',
            'resultado' => 'required|string|max:255',
            'recomendaciones' => 'nullable|string',
        ]);

        $valoracion = ValoracionPsicosocial::create($validated);
        return response()->json($valoracion, 201);
    }

    public function show($id)
    {
        $valoracion = ValoracionPsicosocial::with('nna')->findOrFail($id);
        return response()->json($valoracion);
    }

    public function update(Request $request, $id)
    {
        $valoracion = ValoracionPsicosocial::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'fecha_valoracion' => 'sometimes|required|date',
            'profesional' => 'sometimes|required|string|max:100',
            'tipo_valoracion' => 'sometimes|required|string|max:100',
            'resultado' => 'sometimes|required|string|max:255',
            'recomendaciones' => 'nullable|string',
        ]);

        $valoracion->update($validated);
        return response()->json($valoracion);
    }

    public function destroy($id)
    {
        $valoracion = ValoracionPsicosocial::findOrFail($id);
        $valoracion->delete();
        return response()->json(['message' => 'Valoración eliminada']);
    }
}
