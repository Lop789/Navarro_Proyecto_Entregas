<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.listado', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.form');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nombres'          => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'direccion'        => 'required',
            'correo'           => 'required|email|unique:clientes,correo',
            'estado'           => 'required',
            'contrasena'       => 'required',
            'pic'              => 'required|image|mimes:jpeg,png,jpg|max:3072'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $req->except(['_token', '_method', 'pic']);

        $destinationPath = public_path('imagenes/clientes');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Guardar con nombre temporal, luego renombrar con el id real
        $cliente = Cliente::create($input);

        if ($image = $req->file('pic')) {
            $ext      = $image->getClientOriginalExtension();
            $filename = "cliente_{$cliente->id}.{$ext}";
            $image->move($destinationPath, $filename);
            $cliente->pic = "imagenes/clientes/{$filename}";
            $cliente->save();
        }

        return redirect('/clientes/index')->with('ok', 'Registro guardado');
    }

    public function edit($id)
    {
        $client = Cliente::findOrFail($id);
        return view('clientes.form-edit', ['client' => $client]);
    }

    public function update(Request $req, $id)
    {
        $client = Cliente::findOrFail($id);

        $req->validate([
            'nombres'          => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'direccion'        => 'required',
            'correo'           => 'required',
            'estado'           => 'required',
            'contrasena'       => 'required',
            'pic'              => 'nullable|image'
        ]);

        $client->nombres          = $req->nombres;
        $client->apellido_paterno = $req->apellido_paterno;
        $client->apellido_materno = $req->apellido_materno;
        $client->direccion        = $req->direccion;
        $client->correo           = $req->correo;
        $client->estado           = $req->estado;
        $client->contrasena       = $req->contrasena;

        if ($req->hasFile('pic')) {
            $image           = $req->file('pic');
            $ext             = $image->getClientOriginalExtension();
            $destinationPath = public_path('imagenes/clientes');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $name = "cliente_{$client->id}.{$ext}";
            $image->move($destinationPath, $name);
            $client->pic = "imagenes/clientes/{$name}";
        }

        $client->save();

        return redirect('/clientes/index')->with('ok', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $client = Cliente::findOrFail($id);
        $client->delete();

        return redirect('/clientes/index')->with('ok', 'Registro eliminado');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }
}
