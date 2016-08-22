@extends('layout.principal')

@section('conteudo')
@if (empty($produtos))
    <div class="alert alert-danger">Não existem produtos cadastrados</div>
@else
    <h1>Listagem de Produtos</h1>
    <table class="table table-striped">
        @foreach ($produtos as $p)
        <tr class="{{ $p->quantidade <= 1 ? 'danger' : '' }}">
            <td>{{ $p->nome }}</td>
            <td>{{ $p->valor }}</td>
            <td>{{ $p->descricao }}</td>
            <td>{{ $p->quantidade }}</td>
            <td><a href="{{ action('ProdutoController@mostra', $p->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
            <td><a href="{{ action('ProdutoController@remove', $p->id) }}" class="glyphicon glyphicon-trash"></a></td>
            <td><a href="{{ action('ProdutoController@alterar', $p->id) }}" class="glyphicon glyphicon-wrench"></a></td>
        </tr>
        @endforeach
    </table>
@endif
<h4><span class="label label-danger pull-right">Um ou menos itens no estoque</span></h4>

@if(old('nome'))
<div class="alert alert-success">
    <p class="alert alert-success">O produto: {{ old('nome') }}, foi adicionado com sucesso!</p>
</div>
@endif

@stop