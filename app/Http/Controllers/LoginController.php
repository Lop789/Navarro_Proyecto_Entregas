<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.Login');
    }

public function login(Request $request)
{

    $request->validate([
        'correo' => 'required',
        'contrasena' => 'required',
    ]);

    $credenciales = [
        'correo' => $request->correo,
        'password' => $request->contrasena,
        'estado' => 1
    ];


    if (Auth::guard('admin')->attempt($credenciales)) {

        $request->session()->regenerate();

        return redirect('/admini/index');
    }

    $admin = Administrador::where('correo', $request->correo)
        ->where('estado', 1)
        ->first();

    if ($admin) {
        $passwordCorrecta = $request->contrasena === $admin->contrasena;

        if (!$passwordCorrecta && strlen($admin->contrasena) > 20) {
            $passwordCorrecta = Hash::check($request->contrasena, $admin->contrasena);
        }

        if ($passwordCorrecta) {
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();

            return redirect('/admini/index');
        }
    }

    return back()->withErrors([
        'error' => 'Credenciales incorrectas o cuenta inactiva'
    ]);
}

public function logout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}
