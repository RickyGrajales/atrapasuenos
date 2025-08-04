@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Registrar NNA</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('nna.store') }}" method="POST">
            @csrf
            <!-- selector de acudientes -->
            <div class="mb-3">
                <label for="acudiente_id">Acudiente</label>
                <select name="acudiente_id" class="form-control">
                    <option value="">Seleccione</option>
                    @foreach ($acudientes as $acudiente)
                        <option value="{{ $acudiente->id }}"
                            {{ old('acudiente_id', $nna->acudiente_id ?? '') == $acudiente->id ? 'selected' : '' }}>
                            {{ $acudiente->nombres }} <!-- O combina más campos si es necesario -->
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <label for="nombres" class="form-label">Nombres:</label>
                    <input type="text" name="nombres" class="form-control" required>
                </div>
                <div class="col">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="col">
                    <label for="documento_identidad" class="form-label">Documento de identidad:</label>
                    <input type="text" name="documento_identidad" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <select name="genero" class="form-select" required>
                    <option value="">Seleccione</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="grupo_etnico" class="form-label">Grupo étnico:</label>
                <select name="grupo_etnico" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="Indígena">Indígena</option>
                    <option value="Afrodescendiente">Afrodescendiente</option>
                    <option value="Palenquero">Palenquero</option>
                    <option value="Raizal">Raizal</option>
                    <option value="Rom (Gitano)">Rom (Gitano)</option>
                    <option value="Ninguno">Ninguno</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control">
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
                <div class="col">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="email" name="correo" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="discapacidad" class="form-label">Discapacidad (sí/no o tipo):</label>
                <input type="text" name="discapacidad" class="form-control">
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones:</label>
                <textarea name="observaciones" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
