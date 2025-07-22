<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoPsicosocial;
use Illuminate\Http\Request;

class SeguimientoPsicosocialController extends Controller
{
    public function index()
    {
        return view('seguimiento.index', ['seguimientos' => SeguimientoPsicosocial::all()]);
    }

    public function create()
    {
        return view('seguimiento.create');
    }

    public function store(Request $request)
    {
        SeguimientoPsicosocial::create($request->all());
        return redirect()->route('seguimiento.index')->with('success', 'Seguimiento guardado');
    }

    public function show($id)
    {
        return view('seguimiento.show', ['seguimiento' => SeguimientoPsicosocial::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('seguimiento.edit', ['seguimiento' => SeguimientoPsicosocial::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $seguimiento = SeguimientoPsicosocial::findOrFail($id);
        $seguimiento->update($request->all());
        return redirect()->route('seguimiento.index')->with('success', 'Seguimiento actualizado');
    }

    public function destroy($id)
    {
        SeguimientoPsicosocial::destroy($id);
        return redirect()->route('seguimiento.index')->with('success', 'Seguimiento eliminado');
    }
}
