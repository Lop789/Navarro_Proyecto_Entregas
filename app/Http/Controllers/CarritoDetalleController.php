<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoDetalleController extends Controller
{
    public function listado()
    {
        $detalles = CarritoDetalle::with(['carrito', 'producto'])->get();

        return view('carrito_detalle.listado', compact('detalles'));
    }

    public function formulario()
    {
        $carritos = Carrito::all();
        $productos = Producto::all();

        return view('carrito_detalle.formulario', compact('carritos', 'productos'));
    }
}
