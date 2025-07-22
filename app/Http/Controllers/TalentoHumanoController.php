<?php

namespace App\Http\Controllers;

use App\Models\TalentoHumano;
use Illuminate\Http\Request;

class TalentoHumanoController extends Controller
{
    public function index()
    {
        return response()->json(TalentoHumano::with('institucionAliada')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
            'institucion_aliada_id' => 'required|exists:institucion_aliadas,id',
        ]);

        $talento = TalentoHumano::create($validated);
        return response()->json($talento, 201);
    }

    public function show($id)
    {
        $talento = TalentoHumano::with('institucionAliada')->findOrFail($id);
        return response()->json($talento);
    }

    public function update(Request $request, $id)
    {
        $talento = TalentoHumano::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'rol' => 'sometimes|required|string|max:255',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
            'institucion_aliada_id' => 'sometimes|required|exists:institucion_aliadas,id',
        ]);

        $talento->update($validated);
        return response()->json($talento);
    }

    public function destroy($id)
    {
        $talento = TalentoHumano::findOrFail($id);
        $talento->delete();

        return response()->json(['message' => 'Registro eliminado']);
    }
}
