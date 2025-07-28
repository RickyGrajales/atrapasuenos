<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Atrapasueños')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Estilos personalizados (si usas Laravel Mix o Vite, opcional) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Atrapasueños</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('nna.index') }}">NNA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('acudiente.index') }}">Acudientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('familia.index') }}">Familias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('encuentros.index') }}">Encuentros</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- MENSAJES FLASH --}}
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
