<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

// Usuarios
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

// Productos
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

// Pedidos
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);
