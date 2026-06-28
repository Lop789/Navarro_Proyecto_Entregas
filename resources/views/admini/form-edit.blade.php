@extends('/layouts/navibar')

@section('titulo', 'Editar Administrador')

@section('contenido')

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar Administrador</h2>
    <form action="{{ url('/admini/'.$admin->id).'/update' }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
          <input type="text" name="nombre" value="{{ $admin->nombre }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Nombre" required>
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
          <input type="text" name="apellido" value="{{ $admin->apellido }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Apellido" required>
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
          <input type="text" name="correo" value="{{ $admin->correo }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Correo" required>
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
          <input type="password" name="contrasena" value="{{ $admin->contrasena }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Contraseña" required>
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
          <input type="tel" name="telefono" value="{{ $admin->telefono }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Tel">
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto actual</label>
          @if($admin->pic)
            <img src="{{ asset($admin->pic) }}" alt="Foto actual" class="mb-3 h-24 w-24 rounded object-cover">
          @endif
          <input type="file" name="pic" accept="image/*"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
          <select name="estado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="1" {{ $admin->estado == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ $admin->estado == 0 ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>
        <div class="w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
          <select name="rol"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="base" {{ $admin->rol === 'base' ? 'selected' : '' }}>Base</option>
            <option value="master" {{ $admin->rol === 'master' ? 'selected' : '' }}>Master</option>
          </select>
        </div>
      </div>

      <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">
        Actualizar datos
      </button>
    </form>
  </div>
</section>

@endsection
