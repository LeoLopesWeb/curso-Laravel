@extends('layout.principal')

@section('conteudo')

<h1>Novo produto</h1>

<form action="/produtos/adiciona" method="post">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome">
    </div>

    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" class="form-control" name="descricao">
    </div>

    <div class="form-group">
        <label for="">Valor</label>
        <input type="text" class="form-control" name="valor">
    </div>

    <div class="form-group">
        <label for="">Quantidade</label>
        <input type="number" class="form-control" name="quantidade">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

@stop