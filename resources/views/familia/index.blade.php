@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Familias</h2>
        <a href="{{ route('familia.create') }}" class="btn btn-primary mb-3">Nueva Familia</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NNA</th>
                    <th>Madre</th>
                    <th>Padre</th>
                    <th>Otros miembros</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($familia as $familia)
                    <tr>
                        <td>{{ $familia->nna->nombres }} {{ $familia->nna->apellidos }}</td>
                        <td>{{ $familia->nombre_madre }}</td>
                        <td>{{ $familia->nombre_padre }}</td>
                        <td>{{ $familia->otros_miembros }}</td>
                        <td>{{ $familia->telefono }}</td>
                        <td>{{ $familia->direccion }}</td>
                        <td>{{ $familia->observaciones }}</td>
                        <td>
                            <a href="{{ route('familia.edit', $familia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('familia.destroy', $familia->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
