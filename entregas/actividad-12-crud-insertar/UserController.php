<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.listado', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create($req->only(['name', 'email', 'password']));

        return redirect('/users/index')->with('ok', 'Usuario guardado');
    }
}
