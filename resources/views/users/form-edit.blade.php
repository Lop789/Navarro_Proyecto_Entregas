@extends('layouts.navibar')

@section('titulo', 'Editar usuario')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-md px-4">
    <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
      <h2 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">Editar usuario</h2>

      @if($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700">
          @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form action="{{ url('/users/'.$user->id.'/update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" required>
        </div>

        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" required>
        </div>

        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrasena</label>
          <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" placeholder="Dejar vacio para conservar la actual">
        </div>

        <div class="flex gap-3">
          <button type="submit" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">Actualizar</button>
          <a href="{{ url('/users/index') }}" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 text-sm font-medium">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
