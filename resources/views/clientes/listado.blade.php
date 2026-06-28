@extends('layouts.navibar')

@section('titulo', 'Listado de clientes')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

      <div class="flex items-center justify-between p-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Clientes</h2>
        <a href="{{ url('/clientes/create') }}"
          class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">
          + Nuevo cliente
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th class="px-4 py-3">Id</th>
              <th class="px-4 py-3">Imagen</th>
              <th class="px-4 py-3">Nombre</th>
              <th class="px-4 py-3">Correo</th>
              <th class="px-4 py-3">Dirección</th>
              <th class="px-4 py-3">Estado</th>
              <th class="px-4 py-3 text-right">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $client)
            <tr class="border-b dark:border-gray-700 align-middle">
              <th class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $client->id }}</th>
              <td class="px-4 py-3">
                @if($client->pic)
                  <img src="{{ asset($client->pic) }}" alt="Foto de {{ $client->nombres }}" class="h-14 w-14 rounded object-cover">
                @endif
              </td>
              <td class="px-4 py-3">{{ $client->nombres }} {{ $client->apellido_paterno }} {{ $client->apellido_materno }}</td>
              <td class="px-4 py-3">{{ $client->correo }}</td>
              <td class="px-4 py-3">{{ $client->direccion }}</td>
              <td class="px-4 py-3">{{ $client->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
              <td class="px-4 py-3">
                <div class="flex items-center justify-end gap-4">
                  <a href="{{ url('/clientes/'.$client->id.'/edit') }}" class="hover:underline text-blue-500">Editar</a>
                  <a href="{{ url('/clientes/'.$client->id.'/show') }}" class="hover:underline">Mostrar</a>
                  @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->esMaster())
                    <form action="{{ url('/clientes/'.$client->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

@endsection
