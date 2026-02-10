<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//chamar o metodo index
Route::get('/entregas',[EntregaController::class,'index']);

//chama o metodo show
Route::get('entregas/{id}',[EntregaController::class,'show']);

//chama o store(crud)
Route::middleware('auth:sanctum')->post('/entregas', [EntregaController::class, 'store']);

Route::put('/entregas/{id}', [EntregaController::class, 'update']);

Route::delete('/entregas/{id}', [EntregaController::class, 'destroy']);

//chama a autenticação
Route::post('/login', [AuthController::class, 'login']);