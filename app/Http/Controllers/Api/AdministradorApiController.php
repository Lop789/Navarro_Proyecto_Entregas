<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdministradorApiController extends Controller
{
    public function index()
    {
        return response()->json(['ok' => true, 'datos' => Administrador::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'nullable',
            'correo' => 'required|email|unique:administradores,correo',
            'estado' => 'required|boolean',
            'rol' => 'required|in:master,base',
            'contrasena' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $admin = Administrador::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => $request->estado,
            'rol' => $request->rol,
            'contrasena' => Hash::make($request->contrasena),
        ]);

        $this->guardarImagen($request, $admin);

        return response()->json(['ok' => true, 'mensaje' => 'Administrador creado', 'dato' => $admin], 201);
    }

    public function show($id)
    {
        return response()->json(['ok' => true, 'dato' => Administrador::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $admin = Administrador::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'nullable',
            'correo' => ['required', 'email', Rule::unique('administradores', 'correo')->ignore($admin->id)],
            'estado' => 'required|boolean',
            'rol' => 'required|in:master,base',
            'contrasena' => 'nullable',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $admin->fill($request->only(['nombre', 'apellido', 'telefono', 'correo', 'estado', 'rol']));

        if ($request->filled('contrasena')) {
            $admin->contrasena = Hash::make($request->contrasena);
        }

        $this->guardarImagen($request, $admin);
        $admin->save();

        return response()->json(['ok' => true, 'mensaje' => 'Administrador actualizado', 'dato' => $admin]);
    }

    public function destroy($id)
    {
        $admin = Administrador::findOrFail($id);
        $admin->delete();

        return response()->json(['ok' => true, 'mensaje' => 'Administrador eliminado']);
    }

    private function guardarImagen(Request $request, Administrador $admin): void
    {
        if (!$request->hasFile('pic')) {
            return;
        }

        $path = public_path('imagenes/administradores');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $image = $request->file('pic');
        $filename = 'admin_' . $admin->id . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        $admin->pic = 'imagenes/administradores/' . $filename;
        $admin->save();
    }
}
