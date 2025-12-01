<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Cookie; // ✅ IMPORTANTE PARA O COOKIE

class ProdutoController extends Controller
{
    public function index()
    {
        // ✅ LÊ O COOKIE (ou assume 'todas' se não existir)
        $ultimaCategoria = request()->cookie('ultima_categoria', 'todas');

        $produtos = Produto::latest()->get();
        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias', 'ultimaCategoria'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        Produto::create($data);

        // ✅ CRIA O COOKIE REAL (vale por 60 minutos)
        if ($request->filled('categoria_id')) {
            Cookie::queue('ultima_categoria', $request->categoria_id, 60);
        }

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }
}
