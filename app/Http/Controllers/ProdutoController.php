<?php

namespace estoque\Http\Controllers;

use Validator;
use DB;
use Request;
use estoque\Produto;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['novo', 'remove', 'alterar']]);
    }

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

    public function adiciona(ProdutoRequest $request)
    {
        /*Usando instruções sql
        // Atribui um atributo a determinada variavel
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        
        //DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?, ?, ?, ?)', array($nome, $descricao, $valor, $quantidade));
        */

        // Usar quando for fazer validações pequenas, quando grades utilizar o form request
        //$validator = Validator::make(['nome' => Request::input('nome')], ['nome' => 'required|min:5']);

        // Retorna um array com os erros
        //$messages = $validator->messages();

        // Verifica se existem erros
        //if($validator->fails()) {
            //return redirect()->action('ProdutoController@novo');
            //return $messages;
        //}

        // Usando eloquent
        $produto = Produto::create($request::all());
        
        //$produto->save();

        // Redireciona para o método lista. // Mantém os parametros da requisição anterior. // Especifica quais parâmetros serão enviados
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

    public function atualizar($id, ProdutoRequest $request)
    {
        // Encontra pelo id a linha a ser atualizada , depois atualiza os campos
        $produto = Produto::find($id)->update($request::all());

        // Verifica qual campo tem o id desejado, depois atualiza os campos. USAR COM Request::except()
        //$produto = Produto::where('id', $id)->update(Request::except('_token', '_method'));
        
        return redirect()->action('ProdutoController@lista');
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

}
