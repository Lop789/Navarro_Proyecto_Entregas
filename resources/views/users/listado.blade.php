@extends('layouts.navibar')

@section('titulo', 'Listado de usuarios')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="flex items-center justify-between p-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Usuarios</h2>
        <a href="{{ url('/users/create') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">
          + Nuevo usuario
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th class="px-4 py-3">Id</th>
              <th class="px-4 py-3">Nombre</th>
              <th class="px-4 py-3">Correo</th>
              <th class="px-4 py-3">Verificado</th>
              <th class="px-4 py-3">Creado</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $user->id }}</td>
                <td class="px-4 py-3">{{ $user->name }}</td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3">{{ $user->email_verified_at ?? 'Sin verificar' }}</td>
                <td class="px-4 py-3">{{ $user->created_at }}</td>
              </tr>
            @empty
              <tr>
                <td class="px-4 py-3" colspan="5">No hay usuarios registrados.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
