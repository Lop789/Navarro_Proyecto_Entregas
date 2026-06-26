<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listado()
    {
        $clientes = Cliente::all();

        return view('clientes.listado', compact('clientes'));
    }

    public function formulario()
    {
        return view('clientes.form');
    }
}
