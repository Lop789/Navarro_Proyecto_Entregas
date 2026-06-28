@extends('layouts.navibar')

@section('titulo', 'Listado de detalle de carrito')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 min-h-screen">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Detalle de carrito</h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th class="px-4 py-3">Id</th>
              <th class="px-4 py-3">Carrito</th>
              <th class="px-4 py-3">Producto</th>
              <th class="px-4 py-3">Cantidad</th>
              <th class="px-4 py-3">Precio</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detalles as $detalle)
              <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $detalle->id }}</td>
                <td class="px-4 py-3">{{ optional($detalle->carrito)->session_id }}</td>
                <td class="px-4 py-3">{{ optional($detalle->producto)->nombre }}</td>
                <td class="px-4 py-3">{{ $detalle->cantidad }}</td>
                <td class="px-4 py-3">${{ number_format($detalle->precio_unitario, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
