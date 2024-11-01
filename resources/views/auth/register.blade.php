<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - SmartPool</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-blue-50 to-white">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
            
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('img/Icon_Playa.png') }}" alt="SmartPool Logo" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-bold text-blue-600">Registro en SmartPool</h2>
            </div>

            <!-- Mensajes de Error -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                    <p class="font-bold">Por favor corrige los siguientes errores:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="nombre"
                            required
                        >
                    </div>
                </div>

                <!-- Apellido -->
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700 mb-2">
                        Apellido
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="lastname" 
                            id="lastname" 
                            value="{{ old('lastname') }}"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="apellido"
                            required
                        >
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="ej@correo.com"
                            required
                        >
                    </div>
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Mínimo 8 caracteres"
                            required
                        >
                    </div>
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirmar Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Repite tu contraseña"
                            required
                        >
                    </div>
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Teléfono
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <input 
                            type="tel" 
                            name="phone" 
                            id="phone" 
                            value="{{ old('phone') }}"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="12345678"
                        >
                    </div>
                </div>

                <!-- CI -->
                <div>
                    <label for="u_ci" class="block text-sm font-medium text-gray-700 mb-2">
                        CI
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="u_ci" 
                            id="u_ci" 
                            value="{{ old('u_ci') }}"
                            class="pl-10 w-full rounded-lg border border-gray-300 p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="12345678"
                        >
                    </div>
                </div>

                <!-- Botón de Registro -->
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Registrarse
                    </button>
                </div>

                <!-- Enlace a Login -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        ¿Ya tienes cuenta? Inicia sesión aquí
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script de validación del formulario -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');
        const phone = document.getElementById('phone');
        const ci = document.getElementById('u_ci');

        form.addEventListener('submit', function(event) {
            // Validación de contraseña
            if (password.value.length < 8) {
                alert('La contraseña debe tener al menos 8 caracteres');
                event.preventDefault();
                return;
            }

            if (password.value !== passwordConfirm.value) {
                alert('Las contraseñas no coinciden');
                event.preventDefault();
                return;
            }

            // Validación de teléfono (opcional)
            if (phone.value && !/^\d{7,8}$/.test(phone.value)) {
                alert('El teléfono debe tener entre 7 y 8 dígitos');
                event.preventDefault();
                return;
            }

            // Validación de CI (opcional)
            if (ci.value && !/^\d{7,8}$/.test(ci.value)) {
                alert('El CI debe tener entre 7 y 8 dígitos');
                event.preventDefault();
                return;
            }
        });

        // Validación en tiempo real de contraseñas
        passwordConfirm.addEventListener('input', function() {
            if (password.value !== this.value) {
                this.setCustomValidity('Las contraseñas no coinciden');
            } else {
                this.setCustomValidity('');
            }
        });
    });
    </script>
</body>
</html>