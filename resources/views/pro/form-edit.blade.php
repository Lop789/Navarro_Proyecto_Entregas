@extends('/layouts/navibar')

@section('titulo', 'Editar producto')

@section('contenido')

<section class="bg-[#0f2f2c] py-8 antialiased md:py-4">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-14 text-2xl font-bold dark:text-[#a3ddd3]">Editar Producto</h2>
    <form action="{{ url('/pro/'.$product->id.'/update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Nombre</label>
          <input type="text" name="nombre" value="{{ $product->nombre }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Nombre">
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Categoría</label>
          <select name="categoria"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="Reutilizables" {{ $product->categoria == 'Reutilizables' ? 'selected' : '' }}>Reutilizables</option>
            <option value="Consumo Responsable" {{ $product->categoria == 'Consumo Responsable' ? 'selected' : '' }}>Consumo Responsable</option>
          </select>
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Ahorro kgco2e</label>
          <input type="text" name="ahorro_kgco2e" value="{{ $product->ahorro_kgco2e }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="KgCo2e">
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Ahorro agua (lt)</label>
          <input type="text" name="ahorro_agua_litros" value="{{ $product->ahorro_agua_litros }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Litros">
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Precio</label>
          <input type="number" name="precio" value="{{ $product->precio }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="##">
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Descripción</label>
          <textarea name="descripcion" rows="4"
            class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
            placeholder="Descripción...">{{ $product->descripcion }}</textarea>
        </div>
        <div class="sm:col-span-2 grid gap-4 sm:grid-cols-3">
          @foreach (['pic1' => $product->pic1, 'pic2' => $product->pic2, 'pic3' => $product->pic3] as $name => $pic)
            <div>
              <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">{{ strtoupper($name) }}</label>
              @if($pic)
                <img src="{{ asset($pic) }}" alt="{{ $name }}" class="mb-3 h-24 w-24 rounded object-cover">
              @endif
              <input type="file" name="{{ $name }}" accept="image/*"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
          @endforeach
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium dark:text-[#cfeedd]">Estado</label>
          <select name="estado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="1" {{ $product->estado == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ $product->estado == 0 ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>
      </div>

      <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-green-700 hover:bg-green-800 rounded-lg">
        Actualizar
      </button>
    </form>
  </div>
</section>

@endsection
