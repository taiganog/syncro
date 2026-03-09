<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'register']);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('eventos', function () {
        Route::post('/edit', [EventosController::class, 'edit']);
        Route::post('/delete', [EventosController::class, 'delete']);
    });

    Route::prefix('estoque', function () {
        Route::post('/edit', [EstoqueController::class, 'edit']);
        Route::post('/delete', [EstoqueController::class, 'edit']);
    });

    Route::prefix('produtos', function () {
        Route::post('/edit', [ProdutosController::class, 'edit']);
        Route::post('/delete', [ProdutosController::class, 'delete']);
    });

    Route::prefix('usuarios', function () {
        Route::post('/edit', [UsuariosController::class, 'edit']);
        Route::post('/delete', [UsuariosController::class, 'delete']);
    });

    Route::prefix('equipe', function () {
        Route::post('/edit', [UsuariosController::class, 'edit']);
    });
});
