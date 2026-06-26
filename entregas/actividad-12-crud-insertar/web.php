<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeoController;
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

// Geo
Route::get('/geo',          [GeoController::class, 'index']);
Route::post('/geo/reverse', [GeoController::class, 'reverse']);

// Administradores
Route::prefix('admini')->group(function () {
    Route::get('/index',        [AdministradorController::class, 'index']);
    Route::get('/create',       [AdministradorController::class, 'create']);
    Route::post('/store',       [AdministradorController::class, 'store']);
    Route::get('/{id}/edit',    [AdministradorController::class, 'edit']);
    Route::put('/{id}/update',  [AdministradorController::class, 'update']);
    Route::delete('/{id}',      [AdministradorController::class, 'destroy']);
    Route::get('/{id}/show',    [AdministradorController::class, 'show']);
});

// Clientes
Route::prefix('clientes')->group(function () {
    Route::get('/index',        [ClienteController::class, 'index']);
    Route::get('/create',       [ClienteController::class, 'create']);
    Route::post('/store',       [ClienteController::class, 'store']);
    Route::get('/{id}/edit',    [ClienteController::class, 'edit']);
    Route::put('/{id}/update',  [ClienteController::class, 'update']);
    Route::delete('/{id}',      [ClienteController::class, 'destroy']);
    Route::get('/{id}/show',    [ClienteController::class, 'show']);
});

// Productos
Route::prefix('pro')->group(function () {
    Route::get('/index',        [ProductoController::class, 'index']);
    Route::get('/create',       [ProductoController::class, 'create']);
    Route::post('/store',       [ProductoController::class, 'store']);
    Route::get('/{id}/edit',    [ProductoController::class, 'edit']);
    Route::put('/{id}/update',  [ProductoController::class, 'update']);
    Route::delete('/{id}',      [ProductoController::class, 'destroy']);
    Route::get('/{id}/show',    [ProductoController::class, 'show']);
});

// Usuarios
Route::get('/users/index', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);

// Carrito
Route::get('/carrito/index', [CarritoController::class, 'index']);
Route::get('/carrito/create', [CarritoController::class, 'create']);
Route::post('/carrito/store', [CarritoController::class, 'store']);
