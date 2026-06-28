<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarritoDetalleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoDetalleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/holita', function () { return view('cosas.inicio'); });
Route::get('/yes',    function () { return view('cosas.hobbies'); });
Route::get('/no',     function () { return view('cosas.meats'); });
Route::get('/final',  function () { return view('cosas.myAss'); });
Route::get('/galeria',function () { return view('cosas.galeria'); });
Route::get('/loFlows',function () { return view('flowbite'); });
Route::get('/app',    function () { return view('layouts.index'); });

Route::get('/', function () { return redirect('/admini/index'); });

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Geo
Route::get('/geo',          [GeoController::class, 'index']);
Route::post('/geo/reverse', [GeoController::class, 'reverse']);

// Administradores
Route::prefix('admini')->middleware('auth:admin')->group(function () {
    Route::get('/index',        [AdministradorController::class, 'index']);
    Route::get('/listado',      [AdministradorController::class, 'listado']);
    Route::get('/create',       [AdministradorController::class, 'create']);
    Route::get('/formulario',   [AdministradorController::class, 'formulario']);
    Route::post('/store',       [AdministradorController::class, 'store']);
    Route::get('/{id}/edit',    [AdministradorController::class, 'edit']);
    Route::put('/{id}/update',  [AdministradorController::class, 'update']);
    Route::delete('/{id}',      [AdministradorController::class, 'destroy'])->middleware('admin.master');
    Route::get('/{id}/show',    [AdministradorController::class, 'show']);
});

// Clientes
Route::prefix('clientes')->middleware('auth:admin')->group(function () {
    Route::get('/index',        [ClienteController::class, 'index']);
    Route::get('/listado',      [ClienteController::class, 'listado']);
    Route::get('/create',       [ClienteController::class, 'create']);
    Route::get('/formulario',   [ClienteController::class, 'formulario']);
    Route::post('/store',       [ClienteController::class, 'store']);
    Route::get('/{id}/edit',    [ClienteController::class, 'edit']);
    Route::put('/{id}/update',  [ClienteController::class, 'update']);
    Route::delete('/{id}',      [ClienteController::class, 'destroy'])->middleware('admin.master');
    Route::get('/{id}/show',    [ClienteController::class, 'show']);
});

// Productos
Route::prefix('pro')->middleware('auth:admin')->group(function () {
    Route::get('/index',        [ProductoController::class, 'index']);
    Route::get('/listado',      [ProductoController::class, 'listado']);
    Route::get('/create',       [ProductoController::class, 'create']);
    Route::get('/formulario',   [ProductoController::class, 'formulario']);
    Route::post('/store',       [ProductoController::class, 'store']);
    Route::get('/{id}/edit',    [ProductoController::class, 'edit']);
    Route::put('/{id}/update',  [ProductoController::class, 'update']);
    Route::delete('/{id}',      [ProductoController::class, 'destroy'])->middleware('admin.master');
    Route::get('/{id}/show',    [ProductoController::class, 'show']);
});

// Usuarios
Route::prefix('users')->middleware('auth:admin')->group(function () {
    Route::get('/index',        [UserController::class, 'index']);
    Route::get('/listado',      [UserController::class, 'listado']);
    Route::get('/create',       [UserController::class, 'create']);
    Route::get('/formulario',   [UserController::class, 'formulario']);
    Route::post('/store',       [UserController::class, 'store']);
    Route::get('/{id}/edit',    [UserController::class, 'edit']);
    Route::put('/{id}/update',  [UserController::class, 'update']);
    Route::delete('/{id}',      [UserController::class, 'destroy'])->middleware('admin.master');
    Route::get('/{id}/show',    [UserController::class, 'show']);
});

// Carrito
Route::prefix('carrito')->middleware('auth:admin')->group(function () {
    Route::get('/index',        [CarritoController::class, 'index']);
    Route::get('/listado',      [CarritoController::class, 'listado']);
    Route::get('/create',       [CarritoController::class, 'create']);
    Route::get('/formulario',   [CarritoController::class, 'formulario']);
    Route::post('/store',       [CarritoController::class, 'store']);
    Route::get('/{id}/edit',    [CarritoController::class, 'edit']);
    Route::put('/{id}/update',  [CarritoController::class, 'update']);
    Route::delete('/{id}',      [CarritoController::class, 'destroy'])->middleware('admin.master');
    Route::get('/{id}/show',    [CarritoController::class, 'show']);
});

// Pedidos
Route::prefix('pedidos')->middleware('auth:admin')->group(function () {
    Route::get('/listado',    [PedidoController::class, 'listado']);
    Route::get('/formulario', [PedidoController::class, 'formulario']);
});

// Detalle de pedidos
Route::prefix('pedido-detalle')->middleware('auth:admin')->group(function () {
    Route::get('/listado',    [PedidoDetalleController::class, 'listado']);
    Route::get('/formulario', [PedidoDetalleController::class, 'formulario']);
});

// Detalle de carrito
Route::prefix('carrito-detalle')->middleware('auth:admin')->group(function () {
    Route::get('/listado',    [CarritoDetalleController::class, 'listado']);
    Route::get('/formulario', [CarritoDetalleController::class, 'formulario']);
});
