<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ClienteControllerApi;
use App\Http\Controllers\Api\EnderecoControllerApi;
use App\Http\Controllers\Api\ProdutoControllerApi;
use App\Http\Controllers\Api\OrcamentoControllerApi;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * TODAS AS ROTAS SÃO ACESSADAS POR AQUI
 * api/clientes = MOSTRAR TODOS
 * api/clientes/1 = MOSTRAR APENAS CLIENTE DE ID 1
 */
Route::apiResource('clientes', ClienteControllerApi::class);

/**
 * CONSULTAR ENDERECOS = http://localhost:8000/api/clientes/ID/endereco
 */
Route::apiResource('clientes.endereco', EnderecoControllerApi::class);


// listar de todos os objetos
Route::get('produtos', [ProdutoControllerApi::class, 'showall']);
Route::get('orcamentos', [OrcamentoControllerApi::class, 'showall']);

// listar um objeto por ID
Route::get('produto/{id}', [ProdutoControllerApi::class, 'show']);
Route::get('orcamento/{id}', [OrcamentoControllerApi::class, 'show']);

// salvar novo objeto
Route::post('produto', [ProdutoControllerApi::class, 'store']);
Route::post('orcamento', [OrcamentoControllerApi::class, 'store']);

// atualizar objeto
Route::put('produto/{id}', [ProdutoControllerApi::class, 'update']);

// deletar objeto
Route::delete('produto/{id}', [ProdutoControllerApi::class, 'destroy']);
Route::delete('orcamento/{id}', [OrcamentoControllerApi::class, 'destroy']);
