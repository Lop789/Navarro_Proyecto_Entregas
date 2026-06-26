<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarritoController extends Controller
{
    public function index()
    {
        $carritos = Carrito::all();

        return view('carrito.listado', compact('carritos'));
    }

    public function create()
    {
        return view('carrito.form');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Carrito::create($req->only(['session_id']));

        return redirect('/carrito/index')->with('ok', 'Carrito guardado');
    }
}
