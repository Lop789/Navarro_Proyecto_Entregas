<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoApiController extends Controller
{
    public function index()
    {
        return response()->json(['ok' => true, 'datos' => Pedido::with('cliente')->get()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required|exists:clientes,id',
            'total' => 'required|numeric',
            'estado' => 'required|in:pendiente,cancelado',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $pedido = Pedido::create($request->only(['cliente_id', 'total', 'estado']));

        return response()->json(['ok' => true, 'mensaje' => 'Pedido creado', 'dato' => $pedido->load('cliente')], 201);
    }

    public function show($id)
    {
        return response()->json(['ok' => true, 'dato' => Pedido::with('cliente')->findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required|exists:clientes,id',
            'total' => 'required|numeric',
            'estado' => 'required|in:pendiente,cancelado',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $pedido->update($request->only(['cliente_id', 'total', 'estado']));

        return response()->json(['ok' => true, 'mensaje' => 'Pedido actualizado', 'dato' => $pedido->load('cliente')]);
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return response()->json(['ok' => true, 'mensaje' => 'Pedido eliminado']);
    }
}
