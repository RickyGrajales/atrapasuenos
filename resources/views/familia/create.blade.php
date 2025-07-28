@extends('layouts.app')

@section('content')
    <h2>Registrar Familia</h2>

    <form action="{{ route('familia.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre del padre</label>
            <input type="text" name="nombre_padre" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nombre de la madre</label>
            <input type="text" name="nombre_madre" class="form-control">
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control">
        </div>
        <div class="mb-3">
            <label>NNA relacionado</label>
            <select name="nna_id" class="form-control" required>
                @foreach ($nna as $n)
                    <option value="{{ $n->id }}">{{ $n->nombres }} {{ $n->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Familia</button>
    </form>
@endsection
