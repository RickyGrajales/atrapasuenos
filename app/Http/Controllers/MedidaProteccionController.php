<?php

namespace App\Http\Controllers;

use App\Models\MedidaProteccion;
use Illuminate\Http\Request;

class MedidaProteccionController extends Controller
{
    public function index()
    {
        $medidas = MedidaProteccion::all();
        return view('medidaproteccion.index', compact('medidas'));
    }

    public function create()
    {
        return view('medidaproteccion.create');
    }

    public function store(Request $request)
    {
        MedidaProteccion::create($request->all());
        return redirect()->route('medidaproteccion.index')->with('success', 'Medida de protección registrada correctamente.');
    }

    public function show($id)
    {
        $medida = MedidaProteccion::findOrFail($id);
        return view('medidaproteccion.show', compact('medida'));
    }

    public function edit($id)
    {
        $medida = MedidaProteccion::findOrFail($id);
        return view('medidaproteccion.edit', compact('medida'));
    }

    public function update(Request $request, $id)
    {
        $medida = MedidaProteccion::findOrFail($id);
        $medida->update($request->all());
        return redirect()->route('medidaproteccion.index')->with('success', 'Medida de protección actualizada.');
    }

    public function destroy($id)
    {
        MedidaProteccion::destroy($id);
        return redirect()->route('medidaproteccion.index')->with('success', 'Medida de protección eliminada.');
    }
}
