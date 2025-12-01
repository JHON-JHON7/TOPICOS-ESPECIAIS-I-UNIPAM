@extends('layout')

@section('conteudo')

<div class="alert alert-secondary">
    Última categoria via COOKIE: {{ $ultimaCategoria }}
</div>

<a href="{{ route('produtos.create') }}" class="btn btn-primary mb-2">Novo Produto</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ $produto->preco }}</td>
                <td>
                    <form method="POST" action="{{ route('produtos.destroy', $produto) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
