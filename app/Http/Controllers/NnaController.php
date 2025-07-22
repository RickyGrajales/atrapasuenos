<?php

namespace App\Http\Controllers;

use App\Models\Nna;
use Illuminate\Http\Request;

class NnaController extends Controller
{
    // Mostrar todos los NNA
    public function index()
    {
        return response()->json(Nna::all());
    }

    // Registrar un nuevo NNA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'documento_identidad' => 'required|string|unique:nna,documento_identidad|max:20',
            'genero' => 'required|in:masculino,femenino,otro',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
        ]);

        $nna = Nna::create($validated);
        return response()->json($nna, 201);
    }

    // Mostrar un solo NNA por ID
    public function show($id)
    {
        $nna = Nna::findOrFail($id);
        return response()->json($nna);
    }

    // Actualizar datos del NNA
    public function update(Request $request, $id)
    {
        $nna = Nna::findOrFail($id);

        $validated = $request->validate([
            'nombres' => 'sometimes|required|string|max:100',
            'apellidos' => 'sometimes|required|string|max:100',
            'fecha_nacimiento' => 'sometimes|required|date',
            'documento_identidad' => 'sometimes|required|string|max:20|unique:nna,documento_identidad,' . $nna->id,
            'genero' => 'sometimes|required|in:masculino,femenino,otro',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
        ]);

        $nna->update($validated);
        return response()->json($nna);
    }

    // Eliminar un registro de NNA
    public function destroy($id)
    {
        $nna = Nna::findOrFail($id);
        $nna->delete();
        return response()->json(['mensaje' => 'NNA eliminado correctamente']);
    }
}
