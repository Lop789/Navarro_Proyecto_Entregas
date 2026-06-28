@extends('/layouts/navibar')

@section('titulo', 'Editar cliente')

@section('contenido')

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar Cliente</h2>
    <form action="{{ url('/clientes/'.$client->id.'/update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
          <input type="text" name="nombres" value="{{ $client->nombres }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Nombres">
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</label>
          <input type="text" name="apellido_paterno" value="{{ $client->apellido_paterno }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Apellido Paterno">
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
          <input type="text" name="apellido_materno" value="{{ $client->apellido_materno }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Apellido Materno">
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
          <input type="text" name="correo" value="{{ $client->correo }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Correo">
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
          <input type="password" name="contrasena" value="{{ $client->contrasena }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
          <input type="text" name="direccion" value="{{ $client->direccion }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto actual</label>
          @if($client->pic)
            <img src="{{ asset($client->pic) }}" alt="Foto actual" class="mb-3 h-24 w-24 rounded object-cover">
          @endif
          <input type="file" name="pic" accept="image/*"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
          <select name="estado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="1" {{ $client->estado == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ $client->estado == 0 ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>
      </div>

      <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">
        Actualizar
      </button>
    </form>
  </div>
</section>

@endsection
