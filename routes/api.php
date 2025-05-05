<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EnderecoController;
use App\Http\Controllers\Api\ProfissaoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('clientes/search/{nome}', [ClienteController::class, 'searchByName']);
Route::apiResource('clientes', ClienteController::class);

Route::apiResource('enderecos', EnderecoController::class);

Route::apiResource('profissoes', ProfissaoController::class);
