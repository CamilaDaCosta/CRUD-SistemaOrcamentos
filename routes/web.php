<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/',[ClienteController::class, 'clientes']);
Route::get('/cliente/showall', [ClienteController::class, 'showall']);


//Rotas Produto
Route::get('/produto/showall', [ProdutoController::class, 'showAll']); //Mostrar todos os produtos
Route::get('/produto/{id}', [ProdutoController::class, 'show']); //Monstrar produto por id

//Criar produto
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('produto/', [ProdutoController::class, 'store']);
//Criar produto

Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']); //Delete Produto

//Update Produto
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit']);
Route::put('/produto/update/{id}', [ProdutoController::class, 'update']);
//Update Produto
