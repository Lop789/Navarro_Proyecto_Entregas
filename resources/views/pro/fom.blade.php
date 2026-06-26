@extends('/layouts/navibar')

@section('titulo', 'Crear producto eco')


@section('contenido')
    <section class="bg-[#0f2f2c] py-8 antialiased dark:bg-#d6f3e1 md:py-4">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-14 text-2xl font-bold text-gray-900 dark:text-[#a3ddd3]">Producto</h2>

      @if ($errors->any())
  <div class="mb-4 rounded-lg border border-red-500/40 bg-red-500/10 p-3 text-red-200">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

      <form action="{{ url('/pro/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                  placeholder="Nombre" required="">
              </div>
              <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Categoria</label>
                  <select name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="Reutilizables" {{ (isset($p) && $p->estado == 'Reutilizables') ? 'selected' : '' }}>Reutilizables</option>
                    <option value="Consumo Responsable" {{ (isset($p) && $p->estado == 'Consumo Responsable') ? 'selected' : '' }}>Consumo Responsable</option>
                  </select>
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Ahorro kgco2e</label>
                  <input type="text" name="ahorro_kgco2e" id="ahorro_kgco2e" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                  placeholder="KgCo2e" required="">
              </div>
              <div>
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Ahorro agua (lt)</label>
                  <input type="text" name="ahorro_agua_litros" id="ahorro_agua_litros" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                  placeholder="Litros" required="">
              </div>
              <div>
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Precio</label>
                  <input type="number" name="precio" id="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                  placeholder="##" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Descripcion</label>
                  <textarea name="descripcion" rows="4" class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        placeholder="Escribe la descripción...">
                    </textarea>
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Foto 1</label>
                  <input type="file" name="pic1" id="pic1" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    accept="image/*" required>
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-[#cfeedd]">Foto 2</label>
                  <input type="file" name="pic2" id="pic2" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    accept="image/*" required>
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Foto 3</label>
                  <input type="file" name="pic3" id="pic3" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    accept="image/*" required>
              </div>
              <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#cfeedd]">Estado</label>
                  <select name="estado" id="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="1" {{ (isset($p) && $p->estado == 1) ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ (isset($p) && $p->estado == 0) ? 'selected' : '' }}>Inactivo</option>
                  </select>
              </div> 
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-#14746f hover:bg-#036666 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">
              Registrar
          </button>
      </form>
  </div>
</section>
@endsection