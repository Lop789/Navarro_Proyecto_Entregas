@extends('layouts.navibar')

@section('titulo', 'Formulario de pedidos')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-md px-4">
    <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
      <h2 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">Formulario de pedido</h2>
      <form class="space-y-4">
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente</label>
          <select class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            @foreach ($clientes as $cliente)
              <option>{{ $cliente->nombres }} {{ $cliente->apellido_paterno }}</option>
            @endforeach
          </select>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
