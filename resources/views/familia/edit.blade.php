@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Familia</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario de edición --}}
        <form action="{{ route('familia.update', ['familia' => $familia->id]) }}" method="POST">
            @csrf
            @method('PUT')

            @include('familia._form', [
                'familia' => $familia,
                'nnaList' => $nnaList,
                'route' => route('familia.update', $familia->id),
                'method' => 'PUT'
            ])
        </form>
    </div>
@endsection
