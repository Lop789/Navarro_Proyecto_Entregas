<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoApiController extends Controller
{
    public function index()
    {
        return response()->json(['ok' => true, 'datos' => Producto::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'ahorro_kgco2e' => 'nullable|numeric',
            'ahorro_agua_litros' => 'nullable|numeric',
            'precio' => 'required|numeric',
            'stock' => 'nullable|integer',
            'estado' => 'required|boolean',
            'pic1' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'pic2' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'pic3' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $producto = Producto::create($request->only([
            'nombre',
            'categoria',
            'descripcion',
            'ahorro_kgco2e',
            'ahorro_agua_litros',
            'precio',
            'stock',
            'estado',
        ]));

        $this->guardarImagenes($request, $producto);

        return response()->json(['ok' => true, 'mensaje' => 'Producto creado', 'dato' => $producto], 201);
    }

    public function show($id)
    {
        return response()->json(['ok' => true, 'dato' => Producto::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'ahorro_kgco2e' => 'nullable|numeric',
            'ahorro_agua_litros' => 'nullable|numeric',
            'precio' => 'required|numeric',
            'stock' => 'nullable|integer',
            'estado' => 'required|boolean',
            'pic1' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'pic2' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'pic3' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $producto->fill($request->only([
            'nombre',
            'categoria',
            'descripcion',
            'ahorro_kgco2e',
            'ahorro_agua_litros',
            'precio',
            'stock',
            'estado',
        ]));

        $this->guardarImagenes($request, $producto);
        $producto->save();

        return response()->json(['ok' => true, 'mensaje' => 'Producto actualizado', 'dato' => $producto]);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json(['ok' => true, 'mensaje' => 'Producto eliminado']);
    }

    private function guardarImagenes(Request $request, Producto $producto): void
    {
        $path = public_path('imagenes/productos');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        foreach (['pic1', 'pic2', 'pic3'] as $index => $campo) {
            if (!$request->hasFile($campo)) {
                continue;
            }

            $image = $request->file($campo);
            $numero = $index + 1;
            $filename = 'product_' . $producto->id . '_' . $numero . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $producto->$campo = 'imagenes/productos/' . $filename;
        }

        $producto->save();
    }
}
