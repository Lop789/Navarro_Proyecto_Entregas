<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/administradores/listado');
});

Route::get('/administradores/listado', [AdministradorController::class, 'listado'])
    ->name('administradores.listado');

Route::get('/administradores/formulario', [AdministradorController::class, 'formulario'])
    ->name('administradores.formulario');

Route::get('/clientes/listado', [ClienteController::class, 'listado'])
    ->name('clientes.listado');

Route::get('/clientes/formulario', [ClienteController::class, 'formulario'])
    ->name('clientes.formulario');

Route::get('/productos/listado', [ProductoController::class, 'listado'])
    ->name('productos.listado');

Route::get('/productos/formulario', [ProductoController::class, 'formulario'])
    ->name('productos.formulario');
