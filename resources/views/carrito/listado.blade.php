@extends('layouts.navibar')

@section('titulo', 'Listado de carritos')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="flex items-center justify-between p-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Carrito</h2>
        <a href="{{ url('/carrito/create') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">
          + Nuevo carrito
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th class="px-4 py-3">Id</th>
              <th class="px-4 py-3">Session ID</th>
              <th class="px-4 py-3">Creado</th>
              <th class="px-4 py-3">Actualizado</th>
              <th class="px-4 py-3 text-right">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($carritos as $carrito)
              <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $carrito->id }}</td>
                <td class="px-4 py-3">{{ $carrito->session_id }}</td>
                <td class="px-4 py-3">{{ $carrito->created_at }}</td>
                <td class="px-4 py-3">{{ $carrito->updated_at }}</td>
                <td class="px-4 py-3">
                  <div class="flex items-center justify-end gap-4">
                    <a href="{{ url('/carrito/'.$carrito->id.'/show') }}" class="hover:underline">Mostrar</a>
                    <a href="{{ url('/carrito/'.$carrito->id.'/edit') }}" class="hover:underline text-blue-500">Editar</a>
                    @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->esMaster())
                      <form action="{{ url('/carrito/'.$carrito->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                      </form>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td class="px-4 py-3" colspan="5">No hay carritos registrados.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
