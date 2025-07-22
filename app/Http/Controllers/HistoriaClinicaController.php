<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index()
    {
        $historias = HistoriaClinica::all();
        return view('historiaclinica.index', compact('historias'));
    }

    public function create()
    {
        return view('historiaclinica.create');
    }

    public function store(Request $request)
    {
        HistoriaClinica::create($request->all());
        return redirect()->route('historiaclinica.index')->with('success', 'Historia clínica registrada correctamente.');
    }

    public function show($id)
    {
        $historia = HistoriaClinica::findOrFail($id);
        return view('historiaclinica.show', compact('historia'));
    }

    public function edit($id)
    {
        $historia = HistoriaClinica::findOrFail($id);
        return view('historiaclinica.edit', compact('historia'));
    }

    public function update(Request $request, $id)
    {
        $historia = HistoriaClinica::findOrFail($id);
        $historia->update($request->all());
        return redirect()->route('historiaclinica.index')->with('success', 'Historia clínica actualizada.');
    }

    public function destroy($id)
    {
        HistoriaClinica::destroy($id);
        return redirect()->route('historiaclinica.index')->with('success', 'Historia clínica eliminada.');
    }
}
