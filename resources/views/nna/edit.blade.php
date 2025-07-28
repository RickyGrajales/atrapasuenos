@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar NNA</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay problemas con los campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nna.update', $nna->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombres:</label>
            <input type="text" name="nombres" value="{{ old('nombres', $nna->nombres) }}" class="form-control" required>
        </div>
 
        <div class="mb-3">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="{{ old('apellidos', $nna->apellidos) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $nna->fecha_nacimiento) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Documento de identidad:</label>
            <input type="text" name="documento_identidad" value="{{ old('documento_identidad', $nna->documento_identidad) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Género:</label>
            <select name="genero" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="masculino" {{ $nna->genero === 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ $nna->genero === 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ $nna->genero === 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Grupo étnico:</label>
            <select name="grupo_etnico" class="form-select">
                <option value="">Seleccione</option>
                @foreach(['Indígena', 'Afrocolombiano', 'Raizal', 'Palenquero', 'ROM (Gitano)', 'Ninguno'] as $grupo)
                    <option value="{{ $grupo }}" {{ $nna->grupo_etnico === $grupo ? 'selected' : '' }}>{{ $grupo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono', $nna->telefono) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Correo:</label>
            <input type="email" name="correo" value="{{ old('correo', $nna->correo) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Dirección:</label>
            <input type="text" name="direccion" value="{{ old('direccion', $nna->direccion) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Discapacidad:</label>
            <input type="text" name="discapacidad" value="{{ old('discapacidad', $nna->discapacidad) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Observaciones:</label>
            <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $nna->observaciones) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('nna.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
