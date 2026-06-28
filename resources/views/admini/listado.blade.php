@extends('/layouts/navibar')

@section('titulo', 'Listado de administradores')

@section('contenido')

<section class="bg-white dark:bg-[#0f2f2c] min-h-screen py-16">
  <div class="mx-auto mb-16 max-w-screen-xl h-auto px-4 2xl:px-0">

    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Administradores</h2>
    </div>

    <div class="mb-4">
      <a href="{{ url('/admini/create') }}" class="inline-flex items-center px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">
        + Nuevo administrador
      </a>
    </div>

    <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
      @foreach ($administradores as $admin)
        <div class="items-center bg-gray-300 rounded-lg shadow sm:flex dark:bg-gray-900 dark:border-gray-700 pl-3">
          <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
              {{ $admin->nombre }} {{ $admin->apellido }}
            </h3>
            @if($admin->pic)
              <img src="{{ asset($admin->pic) }}" alt="Foto de {{ $admin->nombre }}" class="my-3 h-24 w-24 rounded object-cover">
            @endif
            <span class="text-gray-500 dark:text-gray-400">{{ $admin->rol ?? 'Administrador' }}</span>
            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">{{ $admin->telefono }}</p>
            <ul class="flex space-x-4 sm:mt-0">
              <li>
                <a href="{{ url('/admini/'.$admin->id.'/edit') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Editar</a>
              </li>
              <li>
                <a href="{{ url('/admini/'.$admin->id.'/show') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Mostrar</a>
              </li>
              @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->esMaster())
                <li>
                  <form action="{{ url('/admini/'.$admin->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                  </form>
                </li>
              @endif
            </ul>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

@endsection
