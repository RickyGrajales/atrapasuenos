@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Familia</h2>
        @include('familia._form', ['route' => route('familia.update', $familia->id), 'method' => 'PUT'])
    </div>
@endsection
