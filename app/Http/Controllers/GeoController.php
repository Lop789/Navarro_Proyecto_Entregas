<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoController extends Controller
{
    public function index()
    {
        return view('geo.index');
    }

    public function reverse(Request $request)
    {
        $data = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $data['latitude'];
        $longitude = $data['longitude'];

        $location = Http::withHeaders([
            'User-Agent' => 'HuellaEco/1.0',
        ])->get('https://nominatim.openstreetmap.org/reverse', [
            'format' => 'jsonv2',
            'lat' => $latitude,
            'lon' => $longitude,
            'accept-language' => 'es',
        ])->json();

        $weather = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'current' => 'temperature_2m,relative_humidity_2m,precipitation,rain',
            'timezone' => 'auto',
        ])->json();

        $address = $location['address'] ?? [];
        $current = $weather['current'] ?? [];

        return response()->json([
            'ciudad' => $address['city'] ?? $address['town'] ?? $address['village'] ?? 'No disponible',
            'estado' => $address['state'] ?? 'No disponible',
            'pais' => $address['country'] ?? 'No disponible',
            'temperatura' => $current['temperature_2m'] ?? null,
            'humedad' => $current['relative_humidity_2m'] ?? null,
            'lluvia' => $current['rain'] ?? $current['precipitation'] ?? null,
            'zona_horaria' => $weather['timezone'] ?? 'No disponible',
            'latitud' => $latitude,
            'longitud' => $longitude,
        ]);
    }
}
