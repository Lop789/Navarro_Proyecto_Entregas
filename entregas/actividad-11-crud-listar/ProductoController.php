<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('pro.listado', compact('productos'));
    }

    public function create()
    {
        return view('pro.fom');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nombre'             => 'required',
            'categoria'          => 'required',
            'descripcion'        => 'required',
            'ahorro_kgco2e'      => 'required',
            'ahorro_agua_litros' => 'required',
            'precio'             => 'required',
            'pic1'               => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'pic2'               => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'pic3'               => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'estado'             => 'required'
        ]);

        $input = $req->except(['_token', '_method', 'pic1', 'pic2', 'pic3']);

        $destinationPath = public_path('imagenes/productos');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Crear primero para tener el id
        $producto = Producto::create($input);

        foreach (['pic1', 'pic2', 'pic3'] as $index => $pic) {
            if ($image = $req->file($pic)) {
                $ext      = $image->getClientOriginalExtension();
                // Formato: product_1_1.png  (id _ numero de foto)
                $num      = $index + 1;
                $filename = "product_{$producto->id}_{$num}.{$ext}";
                $image->move($destinationPath, $filename);
                $producto->$pic = "imagenes/productos/{$filename}";
            }
        }

        $producto->save();

        return redirect('/pro/index')->with('ok', 'Registro guardado');
    }

    public function edit($id)
    {
        $product = Producto::findOrFail($id);
        return view('pro.form-edit', ['product' => $product]);
    }

    public function update(Request $req, $id)
    {
        $producto = Producto::findOrFail($id);

        $req->validate([
            'nombre'      => 'required',
            'categoria'   => 'required',
            'descripcion' => 'required',
            'precio'      => 'required',
            'pic1'        => 'nullable|image',
            'pic2'        => 'nullable|image',
            'pic3'        => 'nullable|image',
        ]);

        $producto->update($req->except(['_token', '_method', 'pic1', 'pic2', 'pic3']));

        $destinationPath = public_path('imagenes/productos');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        foreach (['pic1', 'pic2', 'pic3'] as $index => $pic) {
            if ($req->hasFile($pic)) {
                $image    = $req->file($pic);
                $ext      = $image->getClientOriginalExtension();
                $num      = $index + 1;
                $filename = "product_{$producto->id}_{$num}.{$ext}";
                $image->move($destinationPath, $filename);
                $producto->$pic = "imagenes/productos/{$filename}";
            }
        }

        $producto->save();

        return redirect('/pro/index')->with('ok', 'Actualizado');
    }

    public function destroy($id)
    {
        $p = Producto::findOrFail($id);
        $p->delete();

        return redirect('/pro/index')->with('ok', 'Registro eliminado');
    }

    public function show($id)
    {
        $product = Producto::findOrFail($id);
        return view('pro.show', ['p' => $product]);
    }
}