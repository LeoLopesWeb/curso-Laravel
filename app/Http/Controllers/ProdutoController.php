<?php

namespace estoque\Http\Controllers;

use DB;

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

}