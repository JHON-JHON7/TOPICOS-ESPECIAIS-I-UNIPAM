<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::latest()->get();
        $categorias = Categoria::all();
        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }
}
