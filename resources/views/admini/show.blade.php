@extends('/layouts/navibar')

@section('titulo', 'Mostrar admin')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th class="px-4 py-3">Id</th>
              <th class="px-4 py-3">Imagen</th>
              <th class="px-4 py-3">Nombre</th>
              <th class="px-4 py-3">Correo</th>
              <th class="px-4 py-3">Teléfono</th>
              <th class="px-4 py-3">Estado</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b dark:border-gray-700">
              <th class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $admin->id }}</th>
              <td class="px-4 py-3">
                @if($admin->pic)
                  <img src="{{ asset($admin->pic) }}" alt="Foto de {{ $admin->nombre }}" class="h-20 w-20 rounded object-cover">
                @endif
              </td>
              <td class="px-4 py-3">{{ $admin->nombre }} {{ $admin->apellido }}</td>
              <td class="px-4 py-3">{{ $admin->correo }}</td>
              <td class="px-4 py-3">{{ $admin->telefono }}</td>
              <td class="px-4 py-3">{{ $admin->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="p-4">
        <a href="{{ url('/admini/index') }}" class="text-sm text-blue-500 hover:underline">← Volver al listado</a>
      </div>

    </div>
  </div>
</section>

@endsection
