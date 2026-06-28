<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoDetalleController extends Controller
{
    public function listado()
    {
        $detalles = PedidoDetalle::with(['pedido.cliente', 'producto'])->get();

        return view('pedido_detalle.listado', compact('detalles'));
    }

    public function formulario()
    {
        $pedidos = Pedido::with('cliente')->get();
        $productos = Producto::all();

        return view('pedido_detalle.formulario', compact('pedidos', 'productos'));
    }
}
