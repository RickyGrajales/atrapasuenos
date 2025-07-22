<?php

namespace App\Http\Controllers;

use App\Models\Encuentro;
use Illuminate\Http\Request;

class EncuentroController extends Controller
{
    public function index()
    {
        return response()->json(Encuentro::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'nna_id' => 'required|exists:nna,id',
        ]);

        $encuentro = Encuentro::create($validated);
        return response()->json($encuentro, 201);
    }

    public function show($id)
    {
        $encuentro = Encuentro::with('nna')->findOrFail($id);
        return response()->json($encuentro);
    }

    public function update(Request $request, $id)
    {
        $encuentro = Encuentro::findOrFail($id);

        $validated = $request->validate([
            'tipo' => 'sometimes|required|string|max:100',
            'descripcion' => 'nullable|string',
            'fecha' => 'sometimes|required|date',
            'lugar' => 'sometimes|required|string|max:255',
            'nna_id' => 'sometimes|required|exists:nna,id',
        ]);

        $encuentro->update($validated);
        return response()->json($encuentro);
    }

    public function destroy($id)
    {
        $encuentro = Encuentro::findOrFail($id);
        $encuentro->delete();
        return response()->json(['message' => 'Encuentro eliminado']);
    }
}
