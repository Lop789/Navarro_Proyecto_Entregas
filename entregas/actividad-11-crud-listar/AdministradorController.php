<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all();
        return view('admini.listado', compact('administradores'));
    }

    public function create()
    {
        return view('admini.form');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nombre'    => 'required',
            'apellido'  => 'required',
            'telefono'  => 'required',
            'correo'    => 'required',
            'estado'    => 'required',
            'contrasena'=> 'required',
            'pic'       => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $input = $req->except(['_token', '_method', 'pic']);

        $destinationPath = public_path('imagenes/administradores');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Crear registro primero para obtener el id
        $admin = Administrador::create($input);

        if ($image = $req->file('pic')) {
            $ext      = $image->getClientOriginalExtension();
            $filename = "admin_{$admin->id}.{$ext}";
            $image->move($destinationPath, $filename);
            $admin->pic = "imagenes/administradores/{$filename}";
            $admin->save();
        }

        return redirect('/admini/index')->with('ok', 'Registro guardado');
    }

    public function edit($id)
    {
        $admin = Administrador::findOrFail($id);
        return view('admini.form-edit', ['admin' => $admin]);
    }

    public function update(Request $req, $id)
    {
        $admin = Administrador::findOrFail($id);

        $req->validate([
            'nombre'    => 'required',
            'apellido'  => 'required',
            'telefono'  => 'required',
            'correo'    => 'required',
            'estado'    => 'required',
            'contrasena'=> 'required',
            'pic'       => 'nullable|image'
        ]);

        $admin->nombre    = $req->nombre;
        $admin->apellido  = $req->apellido;
        $admin->telefono  = $req->telefono;
        $admin->correo    = $req->correo;
        $admin->estado    = $req->estado;
        $admin->contrasena= $req->contrasena;

        if ($req->hasFile('pic')) {
            $image           = $req->file('pic');
            $ext             = $image->getClientOriginalExtension();
            $destinationPath = public_path('imagenes/administradores');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $filename = "admin_{$admin->id}.{$ext}";
            $image->move($destinationPath, $filename);
            $admin->pic = "imagenes/administradores/{$filename}";
        }

        $admin->save();

        return redirect('/admini/index')->with('ok', 'Registro actualizado');
    }

    public function destroy($id)
    {
        $admin = Administrador::findOrFail($id);
        $admin->delete();

        return redirect('/admini/index')->with('ok', 'Registro eliminado');
    }

    public function show($id)
    {
        $admin = Administrador::findOrFail($id);
        return view('admini.show', compact('admin'));
    }
}