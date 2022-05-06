<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ClienteControllerApi;
use App\Http\Controllers\ProdutoControllerApi;
use App\Http\Resources\Produto;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// listar de todos os objetos
Route::get('showall', [ClienteControllerApi::class, 'showall']);
Route::get('produtos', [ProdutoControllerApi::class, 'shwoall']);

// listar um objeto por ID
Route::get('produto/{id}', [ProdutoControllerApi::class, 'show']);

// salvar novo objeto
Route::post('store', [ClienteControllerApi::class, 'store']);
Route::post('produto', [ProdutoControllerApi::class, 'store']);

// atualizar objeto
Route::put('produto/{id}', [ProdutoControllerApi::class, 'update']);

// deletar objeto
Route::delete('delete/{id}', [ClienteControllerApi::class, 'destroy']);
Route::delete('produto/{id}', [ProdutoControllerApi::class, 'destroy']);
