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

    public function listado()
    {
        return $this->index();
    }

    public function create()
    {
        return view('users.form');
    }

    public function formulario()
    {
        return view('users.formulario');
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

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.form-edit', compact('user'));
    }

    public function update(Request $req, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = $req->name;
        $user->email = $req->email;

        if ($req->filled('password')) {
            $user->password = $req->password;
        }

        $user->save();

        return redirect('/users/index')->with('ok', 'Usuario actualizado');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users/index')->with('ok', 'Usuario eliminado');
    }
}
