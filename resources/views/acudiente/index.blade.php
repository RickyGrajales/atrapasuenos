@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Acudientes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('acudiente.create') }}" class="btn btn-primary mb-3">Registrar nuevo acudiente</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Acudiente</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Parentesco</th>
                <th>NNA Asociado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($acudiente as $acudiente)
            <tr>
                <td>{{ $acudiente->id }}</td>
                <td>{{ $acudiente->nombres }} {{ $acudiente->apellidos }}</td>
                <td>{{ $acudiente->documento_identidad }}</td>
                <td>{{ $acudiente->telefono }}</td>
                <td>{{ $acudiente->correo }}</td>
                <td>{{ $acudiente->parentesco }}</td>
                <td>
                    @if($acudiente->nna)
                        {{ $acudiente->nna->nombres }} {{ $acudiente->nna->apellidos }}
                    @else
                        <em>No asignado</em>
                    @endif
                </td>
                <td>
                    <a href="{{ route('acudiente.edit', $acudiente->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('acudiente.destroy', $acudiente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
