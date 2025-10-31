<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', [TesteController::class, 'index']);
Route::get('/testeData', [TesteController::class, 'retornaData']);

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/criar', [ProdutoController::class, 'criar'])->name('produtos.criar');
Route::post('/produtos', [ProdutoController::class, 'salvar'])->name('produtos.salvar');