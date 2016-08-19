<?php

namespace estoque\Http\Controllers;

use DB;
use Request;

class ProdutoController extends Controller
{

    public function lista()
    {
        $produtos = DB::select('select * from produtos');

        //return view('listagem')->with('produtos', $produtos);

        // Verifica se existe uma view
        if (view()->exists('produto.listagem')) {
            return view('produto.listagem', ['produtos' => $produtos]);
        }
    }

    public function mostra($id)
    {
        // Usando esse método com queryString
        //$id = Request::input('id', '0');

        //Usando esse método com parametros na url
        //$id = Request::route('id');

        $resposta = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($resposta)) {
            return "Esse produto não existe";
        }

        // Retorna para uma view
        return view('produto.detalhes', ['p' => $resposta[0]]);
    }

    public function novo()
    {
      return view('produto.formulario');
    }

    public function adiciona()
    {
        // Atribui um atributo a determinada variavel
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?, ?, ?, ?)', array($nome, $descricao, $valor, $quantidade));

        // Redireciona para o método lista. // Passa os parametros do formulário. // Especifica quais parâmetros serão enviados
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson()
    {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

}
