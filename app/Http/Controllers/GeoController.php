<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoController extends Controller
{
    //
    public function index()
    {
        return view('geo.index');
    }

    public function reverse(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Aquí puedes implementar la lógica para realizar la geocodificación inversa
        // utilizando una API de geocodificación inversa, como Google Maps Geocoding API.

        // Por ejemplo, podrías hacer una solicitud HTTP a la API y obtener la dirección correspondiente
        // a las coordenadas proporcionadas.

        // Luego, puedes retornar la dirección obtenida como respuesta.
        return response()->json([
            'address' => 'Dirección obtenida a partir de las coordenadas: ' . $latitude . ', ' . $longitude
        ]);
    }
}
