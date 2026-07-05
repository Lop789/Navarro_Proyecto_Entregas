<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClienteApiController extends Controller
{
    public function index()
    {
        return response()->json(['ok' => true, 'datos' => Cliente::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'nullable',
            'direccion' => 'required',
            'correo' => 'required|email|unique:clientes,correo',
            'estado' => 'required|boolean',
            'contrasena' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $cliente = Cliente::create($request->only([
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            'direccion',
            'correo',
            'estado',
            'contrasena',
        ]));

        $this->guardarImagen($request, $cliente);

        return response()->json(['ok' => true, 'mensaje' => 'Cliente creado', 'dato' => $cliente], 201);
    }

    public function show($id)
    {
        return response()->json(['ok' => true, 'dato' => Cliente::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'nullable',
            'direccion' => 'required',
            'correo' => ['required', 'email', Rule::unique('clientes', 'correo')->ignore($cliente->id)],
            'estado' => 'required|boolean',
            'contrasena' => 'required',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $cliente->fill($request->only([
            'nombres',
            'apellido_paterno',
            'apellido_materno',
            'direccion',
            'correo',
            'estado',
            'contrasena',
        ]));

        $this->guardarImagen($request, $cliente);
        $cliente->save();

        return response()->json(['ok' => true, 'mensaje' => 'Cliente actualizado', 'dato' => $cliente]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json(['ok' => true, 'mensaje' => 'Cliente eliminado']);
    }

    private function guardarImagen(Request $request, Cliente $cliente): void
    {
        if (!$request->hasFile('pic')) {
            return;
        }

        $path = public_path('imagenes/clientes');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $image = $request->file('pic');
        $filename = 'cliente_' . $cliente->id . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        $cliente->pic = 'imagenes/clientes/' . $filename;
        $cliente->save();
    }
}
