<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listado()
    {
        $productos = Producto::all();

        return view('pro.listado', compact('productos'));
    }

    public function formulario()
    {
        return view('pro.fom');
    }
}
