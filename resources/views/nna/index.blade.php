@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de NNA registrados</h2>
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('nna.create') }}" class="btn btn-success">+ Registrar nuevo NNA</a>
</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Género</th>
                <th>Grupo Étnico</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nnas as $nna)
            <tr>
                <td>{{ $nna->id }}</td>
                <td>{{ $nna->nombres }}</td>
                <td>{{ $nna->apellidos }}</td>
                <td>{{ $nna->documento_identidad }}</td>
                <td>{{ ucfirst($nna->genero) }}</td>
                <td>{{ $nna->grupo_etnico ?? 'Sin especificar' }}</td>
                <td>{{ $nna->telefono }}</td>
                <td>{{ $nna->correo }}</td>
                <td>
                    <a href="{{ route('nna.edit', $nna->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('nna.destroy', $nna->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este NNA?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No hay registros disponibles.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
