<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::prefix('admini')->group(function () {
        Route::get('/', [AdministradorController::class,'index']);
        // Route::get('/create', [AdministradorController::class,'create']);
        Route::post('/', [AdministradorController::class,'store']);
        Route::get('/{id}', [AdministradorController::class,'show']);
        Route::put('/{id}', [AdministradorController::class,'update']);
        Route::delete('/{id}', [AdministradorController::class,'destroy']);
        //Route::get('/{id}/', [AdministradorController::class,'show']);
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index']);
        // Route::get('/create', [ClienteController::class, 'create']);
        Route::post('/', [ClienteController::class, 'store']);
        Route::get('/{id}', [ClienteController::class, 'show']);
        Route::put('/{id}', [ClienteController::class, 'update']);
        Route::delete('/{id}', [ClienteController::class, 'destroy']);
        // Route::get('/{id}/show', [ClienteController::class, 'show']);
    });

    Route::prefix('pro')->group(function () {
        Route::get('/', [ProductoController::class, 'index']);
        // Route::get('/create', [ProductoController::class, 'create']);
        Route::post('/', [ProductoController::class, 'store']);
        Route::get('/{id}', [ProductoController::class, 'show']);
        Route::put('/{id}', [ProductoController::class, 'update']);
        Route::delete('/{id}', [ProductoController::class, 'destroy']);
        // Route::get('/{id}/show', [ProductoController::class, 'show']);
    });