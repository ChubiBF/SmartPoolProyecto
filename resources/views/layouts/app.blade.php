<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Aquí puedes incluir tu barra de navegación o encabezado -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Aquí puedes incluir tu pie de página -->
    </footer>
</body>
</html>
