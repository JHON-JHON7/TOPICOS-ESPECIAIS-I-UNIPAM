<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de Produtos (CRUD)
Route::resource('produtos', ProdutoController::class);
