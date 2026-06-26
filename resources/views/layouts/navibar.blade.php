<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App huella - @yield('titulo') </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-[#062f2d] to-[#041f1e]">
    
    
<nav class="dark:bg-[#23635D] fixed w-full z-20 top-0 start-0 border-b">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('storage/images/on_fetish.png') }}" alt="Logo" class="h-15 w-auto">
        <span class="self-center text-xl text-heading font-semibold whitespace-nowrap text-white">Huella Eco</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
  <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-[#2b5f53] md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-[#397f6e]">

    <!-- ADMIN DROPDOWN -->
    <li class="relative group py-2">
      <button class="flex items-center py-2 px-3 rounded-lg text-[#cfeedd] hover:text-[#90EE90]">
        Admin
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block absolute top-full left-0 w-56 bg-[#3f704d] shadow-lg rounded-lg overflow-hidden z-50">
        <a href="/admini/index" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Admin List</a>
        <a href="/admini/create" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Admin Create</a>
      </div>
    </li>

    <!-- CLIENTES DROPDOWN -->
    <li class="relative group py-2">
      <button class="flex items-center py-2 px-3 text-[#cfeedd] hover:text-[#90EE90]">
        Clientes
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block absolute top-full left-0 w-56 bg-[#3f704d] shadow-lg rounded-lg overflow-hidden z-50">
        <a href="/clientes/index" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Cliente List</a>
        <a href="/clientes/create" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Cliente Create</a>
      </div>
    </li>

    <!-- Producto -->
    <li class="relative group py-2">
      <button class="flex items-center py-2 px-3 text-[#cfeedd] hover:text-[#90EE90]">
        Productos
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block absolute top-full left-0 w-56 bg-[#3f704d] shadow-lg rounded-lg overflow-hidden z-50">
        <a href="/pro/index" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Productos List</a>
        <a href="/pro/create" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Producto Create</a>
      </div>
    </li>

    <li class="relative group py-2">
      <button class="flex items-center py-2 px-3 text-[#cfeedd] hover:text-[#90EE90]">
        Usuarios
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block absolute top-full left-0 w-56 bg-[#3f704d] shadow-lg rounded-lg overflow-hidden z-50">
        <a href="/users/index" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Usuarios List</a>
        <a href="/users/create" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Usuario Create</a>
      </div>
    </li>

    <li class="relative group py-2">
      <button class="flex items-center py-2 px-3 text-[#cfeedd] hover:text-[#90EE90]">
        Carrito
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block absolute top-full left-0 w-56 bg-[#3f704d] shadow-lg rounded-lg overflow-hidden z-50">
        <a href="/carrito/index" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Carrito List</a>
        <a href="/carrito/create" class="block px-4 py-2 hover:bg-[#a3d5c1] text-[#cfeedd] hover:text-gray-700">Carrito Create</a>
      </div>
    </li>

    <li class="py-2">
  @if(auth('admin')->check())

  <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit"
      class="py-2 px-3 text-[#cfeedd] hover:text-red-300 transition">
      Logout ({{ auth('admin')->user()->nombre }})
    </button>

  </form>

  @endif
</li>


  </ul>
</div>

  </div>
</nav>

<main class="pt-20">
  @yield('contenido')
</main>

</body>
</html>
