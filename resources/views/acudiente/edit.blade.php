@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Acudiente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay problemas con los campos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('acudiente.update', $acudiente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="{{ $acudiente->nombres }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="{{ $acudiente->apellidos }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="documento_identidad">Documento de identidad:</label>
            <input type="text" name="documento_identidad" value="{{ $acudiente->documento_identidad }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="{{ $acudiente->telefono }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="{{ $acudiente->correo }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="parentesco">Parentesco:</label>
            <input type="text" name="parentesco" value="{{ $acudiente->parentesco }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nna_id">Asociar con NNA:</label>
            <select name="nna_id" class="form-control" required>
                <option value="">Seleccione un NNA</option>
                @foreach($nnas as $nna)
                    <option value="{{ $nna->id }}" {{ $acudiente->nna_id == $nna->id ? 'selected' : '' }}>
                        {{ $nna->nombres }} {{ $nna->apellidos }} ({{ $nna->documento_identidad }})
                    </option>
                @endforeach
            </select>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('acudiente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
