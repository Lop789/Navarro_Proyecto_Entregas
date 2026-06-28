@extends('layouts.navibar')

@section('titulo', 'Detalle de producto')

@section('contenido')

<section class="bg-emerald-50 py-8 antialiased dark:bg-[#0f2f2c] md:py-12">
  <div class="mx-auto max-w-screen-xl min-h-screen px-4 2xl:px-0">

    <div class="mb-6">
      <a href="{{ url('/pro/index') }}" class="text-sm text-[#cfeedd] hover:underline">← Volver al listado</a>
      <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-[#cfeedd] sm:text-2xl">Detalle del producto</h2>
    </div>

    <div class="rounded-xl border border-[#2b5f53] bg-[#163b38] p-8 shadow-lg w-full">
      <div class="flex flex-col lg:flex-row items-start gap-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          @foreach ([$p->pic1, $p->pic2, $p->pic3] as $pic)
            @if($pic)
              <img src="{{ asset($pic) }}" alt="Imagen de {{ $p->nombre }}" class="h-40 w-40 rounded-lg object-cover">
            @endif
          @endforeach
        </div>

        <!-- DATOS -->
        <div class="w-full">
          <h3 class="text-3xl font-bold text-white">{{ $p->nombre }}</h3>

          <span class="mt-2 inline-block px-3 py-1 rounded-full text-sm font-medium bg-green-900 text-green-200">
            {{ $p->categoria }}
          </span>

          <p class="mt-4 text-lg text-[#b7e5cd]">{{ $p->descripcion }}</p>

          <div class="mt-6 flex items-center justify-between">
            <p class="text-4xl font-extrabold text-white">${{ number_format($p->precio, 2) }}</p>
            <span class="px-3 py-1 rounded-full text-sm font-medium {{ ($p->estado ?? 1) == 1 ? 'bg-green-700 text-green-200' : 'bg-red-700 text-red-200' }}">
              {{ ($p->estado ?? 1) == 1 ? 'Activo' : 'Inactivo' }}
            </span>
          </div>

          <div class="mt-6 flex gap-4">
            <a href="{{ url('/pro/'.$p->id.'/edit') }}"
              class="px-6 py-2 rounded-lg bg-[#105e5a] text-white hover:bg-[#14746f]">Editar</a>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

@endsection
