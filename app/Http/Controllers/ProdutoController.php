<?php

namespace estoque\Http\Controllers;

use DB;
use Request;
use estoque\Produto;

class ProdutoController extends Controller
{

    public function lista()
    {
        // Usando instruções sql
        //$produtos = DB::select('select * from produtos');

        // Usando o eloquent
        $produtos = Produto::all();

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

        // Usando instruções sql
        //$resposta = DB::select('select * from produtos where id = ?', [$id]);

        // Usando o eloquent
        $resposta = Produto::find($id);


        if (empty($resposta)) {
            return "Esse produto não existe";
        }

        // Retorna para uma view
        return view('produto.detalhes', ['p' => $resposta]);
    }

    public function novo()
    {
      return view('produto.formulario');
    }

    public function adiciona()
    {
        /*Usando instruções sql
        // Atribui um atributo a determinada variavel
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        
        //DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?, ?, ?, ?)', array($nome, $descricao, $valor, $quantidade));
        */

        // Usando eloquent
        $produto = Produto::create(Request::all());
        
        $produto->save();

        // Redireciona para o método lista. // Passa os parametros do formulário. // Especifica quais parâmetros serão enviados
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
;
        return redirect()->action('ProdutoController@lista');
    }

    public function alterar($id)
    {
        $produto = Produto::find($id);
        //return redirect()->action('ProdutoController@lista')->withInput($produto[0]);
        return view('produto.altera', ['p' => $produto]);
    }

    public function atualizar($id)
    {
        // Primeiro encontrar a linha a ser atualizada
        $produto = Produto::find($id);

        // Atualiza a tabela com os campos do form
        $produto->update(Request::all());
        
        return redirect()->action('ProdutoController@lista');
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

}
