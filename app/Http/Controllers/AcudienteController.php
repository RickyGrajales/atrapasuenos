<?php


namespace App\Http\Controllers;

use App\Models\Nna;
use App\Models\Acudiente;
use Illuminate\Http\Request;

class AcudienteController extends Controller
{

    public function index()
    {
        $acudientes = \App\Models\Acudiente::with('nna')->get();
        return view('acudiente.index', compact('acudientes'));
    }

    // Mostrar formulario para editar un acudiente
    public function edit($id)
    {
        $acudiente = Acudiente::findOrFail($id);
        $nnas = Nna::all(); // Para mostrar los NNA disponibles en el select
        return view('acudiente.edit', compact('acudiente', 'nnas'));
    }

    
    public function create()
    {
        $nnas = \App\Models\Nna::all();
        return view('acudiente.create', compact('nnas'));
    }

    // Actualizar un acudiente
    public function update(Request $request, $id)
    {
        $acudiente = Acudiente::findOrFail($id);

        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'documento_identidad' => 'required|string|max:20|unique:acudientes,documento_identidad,' . $acudiente->id,
            'telefono' => 'required|numeric',
            'correo' => 'required|email|max:100',
            'parentesco' => 'required|string|max:50',
            'nna_id' => 'required|exists:nnas,id',
        ]);

        $acudiente->update($validated);

        return redirect()->route('acudiente.index')->with('success', 'Acudiente actualizado correctamente');
    }

    public function store(Request $request)
{
    $request->validate([
        'nna_id' => 'required|exists:nnas,id',
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'documento_identidad' => 'required|string|unique:acudientes,documento_identidad',
        'telefono' => 'required|numeric',
        'correo' => 'required|email|max:255',
        'parentesco' => 'required|string|max:100',
    ]);

    Acudiente::create($request->all());

    return redirect()->route('acudiente.index')->with('success', 'Acudiente creado exitosamente.');
}

public function destroy($id)
{
    $acudiente = Acudiente::findOrFail($id);
    $acudiente->delete();

    return redirect()->route('acudiente.index')->with('success', 'Acudiente eliminado correctamente.');
}



}
