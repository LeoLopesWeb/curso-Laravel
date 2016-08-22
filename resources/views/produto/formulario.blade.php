@extends('layout.principal')

@section('conteudo')

<h1>Novo produto</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('ProdutoController@adiciona') }}" method="post">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
    </div>

    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" class="form-control" name="descricao" value"{{ old('descricao') }}">
    </div>

    <div class="form-group">
        <label for="">Valor</label>
        <input type="text" class="form-control" name="valor" value="{{ old('valor') }}">
    </div>

    <div class="form-group">
        <label for="">Quantidade</label>
        <input type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
</form>

@stop