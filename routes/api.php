<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ClienteControllerApi;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * TODAS AS ROTAS SÃO ACESSADAS POR AQUI
 * api/clientes = MOSTRAR TODOS
 * api/clientes/1 = MOSTRAR APENAS CLIENTE DE ID 1
 */
Route::apiResource('clientes', ClienteControllerApi::class);
