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

    public function listado()
    {
        return $this->index();
    }

    public function create()
    {
        return view('carrito.form');
    }

    public function formulario()
    {
        return view('carrito.formulario');
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

    public function edit($id)
    {
        $carrito = Carrito::findOrFail($id);

        return view('carrito.form-edit', compact('carrito'));
    }

    public function update(Request $req, $id)
    {
        $carrito = Carrito::findOrFail($id);

        $validator = Validator::make($req->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $carrito->session_id = $req->session_id;
        $carrito->save();

        return redirect('/carrito/index')->with('ok', 'Carrito actualizado');
    }

    public function show($id)
    {
        $carrito = Carrito::findOrFail($id);

        return view('carrito.show', compact('carrito'));
    }

    public function destroy($id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();

        return redirect('/carrito/index')->with('ok', 'Carrito eliminado');
    }
}
