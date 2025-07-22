<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Atrapasueños</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap para diseño responsivo --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Atrapasueños</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('nna.create') }}">Nuevo NNA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('familia.index') }}">Familias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('encuentros.index') }}">Encuentros</a></li>
                    <!-- Agrega más enlaces según los módulos -->
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content') {{-- Aquí se carga el contenido de cada vista --}}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
