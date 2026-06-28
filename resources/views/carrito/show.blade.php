@extends('layouts.navibar')

@section('titulo', 'Mostrar carrito')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-md px-4">
    <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
      <h2 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">Detalle del carrito</h2>

      <dl class="grid gap-4 text-gray-700 dark:text-gray-200">
        <div><dt class="font-semibold">Id</dt><dd>{{ $carrito->id }}</dd></div>
        <div><dt class="font-semibold">Session ID</dt><dd>{{ $carrito->session_id }}</dd></div>
        <div><dt class="font-semibold">Creado</dt><dd>{{ $carrito->created_at }}</dd></div>
        <div><dt class="font-semibold">Actualizado</dt><dd>{{ $carrito->updated_at }}</dd></div>
      </dl>

      <a href="{{ url('/carrito/index') }}" class="inline-flex mt-6 px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 text-sm font-medium">Volver</a>
    </div>
  </div>
</section>

@endsection
