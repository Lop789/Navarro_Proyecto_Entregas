@extends('layouts.navibar')

@section('titulo', 'Geolocalizacion')

@section('contenido')

<section class="min-h-screen bg-gray-50 p-4 dark:bg-[#0f2f2c]">
  <div class="mx-auto max-w-screen-md rounded-lg bg-white p-6 shadow dark:bg-gray-800">
    <div class="mb-6 flex items-center justify-between">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Geolocalizacion</h2>
      <button id="btn-geo" class="rounded-lg bg-green-700 px-4 py-2 text-sm font-medium text-white hover:bg-green-800">
        Obtener ubicacion
      </button>
    </div>

    <div id="geo-status" class="mb-4 text-sm text-gray-600 dark:text-gray-300">
      Presiona el boton y permite el acceso a la ubicacion del navegador.
    </div>

    <div id="geo-result" class="grid gap-4 text-gray-700 dark:text-gray-200"></div>
  </div>
</section>

<script>
  const button = document.getElementById('btn-geo');
  const statusBox = document.getElementById('geo-status');
  const resultBox = document.getElementById('geo-result');

  button.addEventListener('click', () => {
    if (!navigator.geolocation) {
      statusBox.textContent = 'El navegador no soporta geolocalizacion.';
      return;
    }

    statusBox.textContent = 'Solicitando ubicacion...';

    navigator.geolocation.getCurrentPosition(async (position) => {
      const response = await fetch('/geo/reverse', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          latitude: position.coords.latitude,
          longitude: position.coords.longitude
        })
      });

      const data = await response.json();
      statusBox.textContent = 'Informacion recibida desde las APIs.';
      resultBox.innerHTML = '';

      Object.entries(data).forEach(([key, value]) => {
        const item = document.createElement('div');
        item.className = 'rounded-lg border border-gray-200 p-4 dark:border-gray-700';
        item.innerHTML = `<dt class="font-semibold capitalize">${key.replace('_', ' ')}</dt><dd>${value ?? 'No disponible'}</dd>`;
        resultBox.appendChild(item);
      });
    }, () => {
      statusBox.textContent = 'No se pudo obtener la ubicacion. Revisa los permisos del navegador.';
    });
  });
</script>

@endsection
