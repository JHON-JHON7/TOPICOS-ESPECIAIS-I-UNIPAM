@extends('layouts.app')

@section('content')
<h1>Produtos</h1>
<div class="row">
  <div class="col-md-6">
    <h4>Cadastrar Produto</h4>
    <form method="POST" action="{{ route('produtos.store') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Categoria (opcional)</label>
        <select name="categoria_id" class="form-select">
          <option value="">-- nenhuma --</option>
          @foreach($categorias as $cat)
            <option value="{{ $cat->id }}" @if(old('categoria_id') == $cat->id) selected @endif>{{ $cat->nome }}</option>
          @endforeach
        </select>
      </div>
      <button class="btn btn-primary">Salvar</button>
    </form>
  </div>
  <div class="col-md-6">
    <h4>Lista de Produtos</h4>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Nome</th><th>Preço</th><th>Categoria</th></tr></thead>
      <tbody>
        @foreach($produtos as $p)
          <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
            <td>{{ $p->categoria?->nome ?? '-' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
