@extends('layout')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
    </div>

    @if($produtos->count() > 0)
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>
                            <a href="{{ route('produtos.show', $produto) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Nenhum produto cadastrado.</div>
    @endif
@endsection
