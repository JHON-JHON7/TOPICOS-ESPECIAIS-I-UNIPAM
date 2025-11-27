@extends('layout')

@section('titulo', $produto->nome)

@section('conteudo')
    <div class="row">
        <div class="col-md-6">
            @if($produto->imagem)
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="img-fluid">
            @else
                <div class="alert alert-secondary">Sem imagem</div>
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $produto->nome }}</h1>
            <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>

            <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
