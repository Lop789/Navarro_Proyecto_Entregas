<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarritoApiController extends Controller
{
    public function index()
    {
        return response()->json(['ok' => true, 'datos' => Carrito::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $carrito = Carrito::create($request->only('session_id'));

        return response()->json(['ok' => true, 'mensaje' => 'Carrito creado', 'dato' => $carrito], 201);
    }

    public function show($id)
    {
        return response()->json(['ok' => true, 'dato' => Carrito::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $carrito = Carrito::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $carrito->update($request->only('session_id'));

        return response()->json(['ok' => true, 'mensaje' => 'Carrito actualizado', 'dato' => $carrito]);
    }

    public function destroy($id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();

        return response()->json(['ok' => true, 'mensaje' => 'Carrito eliminado']);
    }
}
