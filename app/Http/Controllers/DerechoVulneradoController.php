<?php

namespace App\Http\Controllers;

use App\Models\DerechoVulnerado;
use Illuminate\Http\Request;

class DerechoVulneradoController extends Controller
{
    public function index()
    {
        $derechos = DerechoVulnerado::all();
        return view('derechovulnerado.index', compact('derechos'));
    }

    public function create()
    {
        return view('derechovulnerado.create');
    }

    public function store(Request $request)
    {
        DerechoVulnerado::create($request->all());
        return redirect()->route('derechovulnerado.index')->with('success', 'Derecho vulnerado registrado correctamente.');
    }

    public function show($id)
    {
        $derecho = DerechoVulnerado::findOrFail($id);
        return view('derechovulnerado.show', compact('derecho'));
    }

    public function edit($id)
    {
        $derecho = DerechoVulnerado::findOrFail($id);
        return view('derechovulnerado.edit', compact('derecho'));
    }

    public function update(Request $request, $id)
    {
        $derecho = DerechoVulnerado::findOrFail($id);
        $derecho->update($request->all());
        return redirect()->route('derechovulnerado.index')->with('success', 'Derecho vulnerado actualizado.');
    }

    public function destroy($id)
    {
        DerechoVulnerado::destroy($id);
        return redirect()->route('derechovulnerado.index')->with('success', 'Derecho vulnerado eliminado.');
    }
}
