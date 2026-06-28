<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function listado()
    {
        $pedidos = Pedido::with('cliente')->get();

        return view('pedidos.listado', compact('pedidos'));
    }

    public function formulario()
    {
        $clientes = Cliente::all();

        return view('pedidos.formulario', compact('clientes'));
    }
}
