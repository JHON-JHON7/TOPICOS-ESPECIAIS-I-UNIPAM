@extends('layouts.app')

@section('content')
<h1>Categorias</h1>
<div class="row">
  <div class="col-md-6">
    <h4>Cadastrar Categoria</h4>
    <form method="POST" action="{{ route('categorias.store') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
      </div>
      <button class="btn btn-primary">Salvar</button>
    </form>
  </div>
  <div class="col-md-6">
    <h4>Lista de Categorias</h4>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Nome</th></tr></thead>
      <tbody>
        @foreach($categorias as $c)
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
