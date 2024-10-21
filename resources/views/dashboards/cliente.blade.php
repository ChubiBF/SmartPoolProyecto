<!-- resources/views/dashboards/cliente.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Cliente - SmartPool</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold">SmartPool</a>
            <div>
                <span class="text-white mr-4">Bienvenido, {{ Auth::user()->Nombre }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-white text-blue-600 py-2 px-4 rounded hover:bg-blue-100">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard de Cliente</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Mis Reservas</h2>
                <p class="mb-4">Aquí puedes ver y gestionar tus reservas actuales.</p>
                <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ver Reservas</a>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Nueva Reserva</h2>
                <p class="mb-4">Realiza una nueva reserva para la piscina.</p>
                <a href="#" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Hacer Reserva</a>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Servicios Disponibles</h2>
                <p class="mb-4">Explora los servicios y productos que ofrecemos.</p>
                <a href="#" class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">Ver Servicios</a>
            </div>
        </div>
    </div>
</body>
</html>