<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // READ - Listar todos os produtos
    public function index()
    {
        $categoria = session('categoria', 'todos');
        $produtos = Produto::all();

        return view('produtos.index', compact('produtos', 'categoria'));
    }

    // CREATE - Mostrar formulário de criação
    public function create()
    {
        return view('produtos.create');
    }

    // STORE - Salvar novo produto
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:produtos',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:0',
            'imagem' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);

        $data = $request->all();

        // Processar upload de imagem
        if ($request->hasFile('imagem')) {
            $caminho = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $caminho;
        }

        Produto::create($data);

        // Cookie para lembrar última categoria visualizada
        session(['categoria' => 'produtos']);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    // SHOW - Exibir detalhes de um produto
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // EDIT - Mostrar formulário de edição
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    // UPDATE - Atualizar produto
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:produtos,nome,' . $produto->id,
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:0',
            'imagem' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            $caminho = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $caminho;
        }

        $produto->update($data);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // DELETE - Deletar produto
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto deletado com sucesso!');
    }
}
