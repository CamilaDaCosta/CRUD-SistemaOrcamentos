<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ClienteControllerApi;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('showall', [ClienteControllerApi::class, 'showall']);

Route::post('store', [ClienteControllerApi::class, 'store']);

Route::delete('delete/{id}', [ClienteControllerApi::class, 'destroy']);
