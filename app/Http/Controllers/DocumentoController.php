<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        return response()->json(Documento::with('nna')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'archivo' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'nna_id' => 'required|exists:nna,id',
        ]);

        if ($request->hasFile('archivo')) {
            $ruta = $request->file('archivo')->store('documentos', 'public');
            $validated['archivo'] = $ruta;
        }

        $documento = Documento::create($validated);
        return response()->json($documento, 201);
    }

    public function show($id)
    {
        $documento = Documento::with('nna')->findOrFail($id);
        return response()->json($documento);
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);

        $validated = $request->validate([
            'tipo' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'sometimes|required|date',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'nna_id' => 'sometimes|required|exists:nna,id',
        ]);

        if ($request->hasFile('archivo')) {
            // eliminar archivo anterior si existe
            if ($documento->archivo) {
                Storage::disk('public')->delete($documento->archivo);
            }
            $ruta = $request->file('archivo')->store('documentos', 'public');
            $validated['archivo'] = $ruta;
        }

        $documento->update($validated);
        return response()->json($documento);
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);

        if ($documento->archivo) {
            Storage::disk('public')->delete($documento->archivo);
        }

        $documento->delete();
        return response()->json(['message' => 'Documento eliminado']);
    }
}
