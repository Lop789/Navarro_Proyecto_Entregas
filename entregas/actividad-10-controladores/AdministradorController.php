<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function listado()
    {
        $administradores = Administrador::all();

        return view('admini.listado', compact('administradores'));
    }

    public function formulario()
    {
        return view('admini.form');
    }
}
