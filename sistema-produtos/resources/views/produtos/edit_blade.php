@extends('layout')

@section('titulo', 'Editar Produto')

@section('conteudo')
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', $produto->nome) }}" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço (R$)</label>
            <input type="number" name="preco" id="preco" class="form-control @error('preco') is-invalid @enderror" step="0.01" value="{{ old('preco', $produto->preco) }}" required>
            @error('preco')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control @error('quantidade') is-invalid @enderror" value="{{ old('quantidade', $produto->quantidade) }}" required>
            @error('quantidade')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem (PNG ou JPG)</label>
            @if($produto->imagem)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" width="150">
                </div>
            @endif
            <input type="file" name="imagem" id="imagem" class="form-control @error('imagem') is-invalid @enderror" accept="image/png,image/jpeg">
            @error('imagem')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
