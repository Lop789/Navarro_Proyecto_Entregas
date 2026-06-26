<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $carritos = Carrito::all();

        return view('carrito.listado', compact('carritos'));
    }
}
