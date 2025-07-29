<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Models\Nna;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    public function index()
    {
        $familias = Familia::with('nna')->get();
        return view('familia.index', compact('familias'));
    }

    public function create()
    {
        $nnaList = Nna::all();
        return view('familia.create', compact('nnaList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nna_id' => 'required|exists:nnas,id',
            'nombre_madre' => 'nullable|string|max:255',
            'nombre_padre' => 'nullable|string|max:255',
            'otros_miembros' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
        ]);

        Familia::create($request->all());
        return redirect()->route('familia.index')->with('success', 'Familia registrada correctamente.');
    }

    public function edit(Familia $familia)
    {
        $nnaList = Nna::all();
        return view('familia.edit', compact('familia', 'nnaList'));
    }

    public function update(Request $request, Familia $familia)
    {
        $request->validate([
            'nna_id' => 'required|exists:nnas,id',
        ]);

        $familia->update($request->all());
        return redirect()->route('familia.index')->with('success', 'Familia actualizada.');
    }

    public function destroy($id)
    {
        $familia = Familia::findOrFail($id);
        $familia->delete();
        return redirect()->route('familia.index')->with('success', 'Familia eliminada.');
    }
}
