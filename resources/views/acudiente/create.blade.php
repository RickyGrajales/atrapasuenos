@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Acudiente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('acudiente.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nna_id" class="form-label">Seleccionar NNA</label>
            <select name="nna_id" class="form-control" required>
                <option value="">-- Seleccione --</option>
                @foreach($nnas as $nna)
                    <option value="{{ $nna->id }}">{{ $nna->nombres }} {{ $nna->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="documento_identidad" class="form-label">Documento de Identidad</label>
            <input type="text" name="documento_identidad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="parentesco" class="form-label">Parentesco</label>
            <input type="text" name="parentesco" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('acudiente.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
