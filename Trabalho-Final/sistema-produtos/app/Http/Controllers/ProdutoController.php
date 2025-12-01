<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Cookie;

class ProdutoController extends Controller
{
    public function index()
    {
        $ultimaCategoria = request()->cookie('ultima_categoria', 'todas');
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos', 'ultimaCategoria'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        Produto::create($data);

        Cookie::queue('ultima_categoria', 'produtos', 60);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado!');
    }
}
