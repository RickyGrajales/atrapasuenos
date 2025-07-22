<?php

namespace App\Http\Controllers;

use App\Models\ParticipacionEncuentro;
use Illuminate\Http\Request;

class ParticipacionEncuentroController extends Controller
{
    public function index()
    {
        return response()->json(ParticipacionEncuentro::with(['nna', 'encuentro'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nna_id' => 'required|exists:nna,id',
            'encuentro_id' => 'required|exists:encuentros,id',
            'asistencia' => 'required|boolean',
            'observaciones' => 'nullable|string|max:255',
            'fecha_participacion' => 'required|date',
        ]);

        $participacion = ParticipacionEncuentro::create($validated);
        return response()->json($participacion, 201);
    }

    public function show($id)
    {
        $participacion = ParticipacionEncuentro::with(['nna', 'encuentro'])->findOrFail($id);
        return response()->json($participacion);
    }

    public function update(Request $request, $id)
    {
        $participacion = ParticipacionEncuentro::findOrFail($id);

        $validated = $request->validate([
            'nna_id' => 'sometimes|required|exists:nna,id',
            'encuentro_id' => 'sometimes|required|exists:encuentros,id',
            'asistencia' => 'sometimes|required|boolean',
            'observaciones' => 'nullable|string|max:255',
            'fecha_participacion' => 'sometimes|required|date',
        ]);

        $participacion->update($validated);
        return response()->json($participacion);
    }

    public function destroy($id)
    {
        $participacion = ParticipacionEncuentro::findOrFail($id);
        $participacion->delete();
        return response()->json(['message' => 'Participación eliminada']);
    }
}
