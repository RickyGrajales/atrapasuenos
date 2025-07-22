<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    public function index()
    {
        return response()->json(Familia::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'nombre_padre' => 'required|string|max:100',
            'nombre_madre' => 'required|string|max:100',
            'telefono_contacto' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
        ]);

        $familia = Familia::create($validated);
        return response()->json($familia, 201);
    }

    public function show($id)
    {
        $familia = Familia::with('nna')->findOrFail($id);
        return response()->json($familia);
    }

    public function update(Request $request, $id)
    {
        $familia = Familia::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'nombre_padre' => 'sometimes|required|string|max:100',
            'nombre_madre' => 'sometimes|required|string|max:100',
            'telefono_contacto' => 'sometimes|required|string|max:20',
            'direccion' => 'sometimes|required|string|max:255',
        ]);

        $familia->update($validated);
        return response()->json($familia);
    }

    public function destroy($id)
    {
        $familia = Familia::findOrFail($id);
        $familia->delete();
        return response()->json(['message' => 'Familia eliminada']);
    }
}
