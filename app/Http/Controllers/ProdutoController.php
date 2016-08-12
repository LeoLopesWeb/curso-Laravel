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
        if (view()->exists('listagem')) {
            return view('listagem', ['produtos' => $produtos]);
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

        return view('detalhes', ['p' => $resposta[0]]);
    }

}