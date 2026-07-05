<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministradorAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['ok' => false, 'errores' => $validator->errors()], 422);
        }

        $admin = Administrador::where('correo', $request->correo)
            ->where('estado', 1)
            ->first();

        if (!$admin) {
            return response()->json(['ok' => false, 'mensaje' => 'Credenciales incorrectas o cuenta inactiva'], 401);
        }

        $passwordCorrecta = Hash::check($request->contrasena, $admin->contrasena)
            || $request->contrasena === $admin->contrasena;

        if (!$passwordCorrecta) {
            return response()->json(['ok' => false, 'mensaje' => 'Credenciales incorrectas o cuenta inactiva'], 401);
        }

        $token = $admin->createToken('token-admin')->plainTextToken;

        return response()->json([
            'ok' => true,
            'mensaje' => 'Inicio de sesion correcto',
            'token' => $token,
            'administrador' => $admin,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'ok' => true,
            'mensaje' => 'Sesion cerrada correctamente',
        ]);
    }

    public function perfil(Request $request)
    {
        return response()->json([
            'ok' => true,
            'administrador' => $request->user(),
        ]);
    }
}
