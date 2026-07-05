<?php

use App\Http\Controllers\Api\AdministradorApiController;
use App\Http\Controllers\Api\AdministradorAuthController;
use App\Http\Controllers\Api\CarritoApiController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\PedidoApiController;
use App\Http\Controllers\Api\ProductoApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Actividades 22, 23 y 24:
| API REST del area administrativa, gestion de imagenes y token Sanctum.
|
*/

Route::post('/admin/login', [AdministradorAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/perfil', [AdministradorAuthController::class, 'perfil']);
    Route::post('/admin/logout', [AdministradorAuthController::class, 'logout']);

    Route::apiResource('administradores', AdministradorApiController::class)
        ->parameters(['administradores' => 'administrador']);
    Route::apiResource('clientes', ClienteApiController::class);
    Route::apiResource('productos', ProductoApiController::class);
    Route::apiResource('pedidos', PedidoApiController::class);
    Route::apiResource('carrito', CarritoApiController::class);
});
