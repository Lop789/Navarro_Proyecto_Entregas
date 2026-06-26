@extends('layouts.navibar')

@section('titulo', 'Listado de productos')

@section('contenido')

<section class="bg-emerald-50 py-8 antialiased dark:bg-[#0f2f2c] md:py-12">
  <div class="mx-auto max-w-screen-xl min-h-screen px-4 2xl:px-0">

    <div class="mb-6 flex items-center justify-between">
      <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-[#cfeedd] sm:text-2xl">Listado de productos</h2>
      <a href="{{ url('/pro/create') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800 text-sm font-medium">+ Nuevo producto</a>
    </div>

    <div class="grid gap-6 grid-cols-1 md:gap-6 lg:grid-cols-2">

      @forelse ($productos as $p)

        <div class="rounded-xl border border-[#2b5f53] bg-[#163b38] p-6 shadow-lg w-full">
          <div class="flex items-center gap-6">

            <!-- DATOS -->
            <div class="w-full">
              <h3 class="text-2xl font-bold text-white">{{ $p->nombre }}</h3>
              <div class="mt-4 flex items-center justify-between">
                <p class="text-3xl font-extrabold text-white">${{ number_format($p->precio, 2) }}</p>
                <span class="px-3 py-1 rounded-full text-sm font-medium {{ ($p->estado ?? 1) == 1 ? 'bg-green-700 text-green-200' : 'bg-red-700 text-red-200' }}">
                  {{ ($p->estado ?? 1) == 1 ? 'Activo' : 'Inactivo' }}
                </span>
              </div>
              <div class="mt-4 flex gap-3">
                <a href="{{ url('/pro/'.$p->id.'/show') }}" class="px-4 py-2 rounded-lg bg-[#0f2f2c] text-white hover:bg-[#105e5a] text-sm">Ver</a>
                <a href="{{ url('/pro/'.$p->id.'/edit') }}" class="px-4 py-2 rounded-lg bg-[#105e5a] text-white hover:bg-[#14746f] text-sm">Editar</a>
                @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->esMaster())
                  <form action="{{ url('/pro/'.$p->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#8b1e2d] hover:bg-[#721826] text-white px-4 py-2 rounded-lg text-sm">Eliminar</button>
                  </form>
                @endif
              </div>
            </div>

          </div>
        </div>

      @empty
        <div class="col-span-full rounded-lg border border-gray-200 bg-white p-6 text-gray-700">
          No hay productos registrados.
        </div>
      @endforelse

    </div>
  </div>
</section>

@endsection
