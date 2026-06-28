@extends('layouts.navibar')

@section('titulo', 'Formulario detalle de pedidos')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-md px-4">
    <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
      <h2 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">Formulario de detalle de pedido</h2>
      <form class="space-y-4">
        <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
          @foreach ($pedidos as $pedido)
            <option>Pedido #{{ $pedido->id }} - {{ optional($pedido->cliente)->nombres }}</option>
          @endforeach
        </select>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
          @foreach ($productos as $producto)
            <option>{{ $producto->nombre }}</option>
          @endforeach
        </select>
      </form>
    </div>
  </div>
</section>

@endsection
