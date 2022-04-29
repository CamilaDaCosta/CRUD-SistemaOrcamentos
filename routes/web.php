<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

Route::get('/',[ClienteController::class, 'clientes']);
Route::get('/cliente/showall', [ClienteController::class, 'showall']);
