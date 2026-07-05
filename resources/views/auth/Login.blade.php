<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huella Ecológica - Iniciar Sesión</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-teal-900 via-teal-800 to-green-900">
    <section class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo y Título -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('imagenes/logo_huella_ecologica.png') }}" alt="Logo Huella Ecológica" class="h-48 w-auto">
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">Huella Eco</h1>
                <p class="text-teal-100 text-lg">Gestión de Productos y Pedidos</p>
            </div>

            <!-- Card de Login -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">Iniciar Sesión</h2>
                </div>

                <div class="p-8">
                    <!-- Errores -->
                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-red-800 font-semibold text-sm mb-2">❌ Error en el inicio de sesión:</p>
                            @foreach($errors->all() as $error)
                                <p class="text-red-700 text-sm">• {{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="/login" method="POST" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label for="correo" class="block text-sm font-semibold text-gray-700 mb-2">
                                Correo Electrónico
                            </label>
                            <input 
                                type="email" 
                                name="correo" 
                                id="correo" 
                                value="{{ old('correo') }}"
                                placeholder="tu.correo@ejemplo.com" 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition duration-200 outline-none" 
                                required>
                        </div>

                        <!-- Contraseña -->
                        <div>
                            <label for="contrasena" class="block text-sm font-semibold text-gray-700 mb-2">
                                Contraseña
                            </label>
                            <input 
                                type="password" 
                                name="contrasena" 
                                id="contrasena" 
                                placeholder="••••••••" 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition duration-200 outline-none" 
                                required>
                        </div>

                        <!-- Recordarme -->
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember" 
                                class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500 cursor-pointer">
                            <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer">
                                Recuérdame en este dispositivo
                            </label>
                        </div>

                        <!-- Botón Enviar -->
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white font-bold py-3 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            Iniciar Sesión
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-center text-gray-600 text-sm">
                            ¿Olvidaste tu contraseña? 
                            <a href="#" class="text-teal-600 font-semibold hover:text-teal-700">Recuperarla aquí</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Información Adicional -->
            <div class="mt-6 text-center text-teal-100 text-sm">
                <p>© 2026 Huella Ecológica | Todos los derechos reservados</p>
            </div>
        </div>
    </section>
</body>
</html>
