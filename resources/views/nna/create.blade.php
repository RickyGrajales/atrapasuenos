@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar NNA</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('nna.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" required>
        </div>

        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>
        </div>

        <div>
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
        </div>

        <div>
            <label for="documento_identidad">Documento de identidad:</label>
            <input type="text" name="documento_identidad" required>
        </div>

        <div>
            <label for="genero">Género:</label>
            <select name="genero" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion">
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono">
        </div>

        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo">
        </div>

        <div>
            <label for="discapacidad">Discapacidad (sí/no o tipo):</label>
            <input type="text" name="discapacidad">
        </div>

        <div>
            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones" rows="3"></textarea>
        </div>

        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>
</div>
@endsection
