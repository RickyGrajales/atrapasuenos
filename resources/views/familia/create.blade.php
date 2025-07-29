@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nueva Familia</h2>
        @include('familia._form', ['route' => route('familia.store'), 'method' => 'POST'])
    </div>
@endsection
