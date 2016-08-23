<?php

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('/login', 'LoginController@login');


Route::get('/sobre', function () {
    return "Informações sobre o site";
});

Route::get('/contato', function () {
    return "Página de contato do site";
});

Route::get('/{produtos?}', 'ProdutoController@lista');

Route::get('/produtos/mostra/{id}', "ProdutoController@mostra")->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produto/alterar/{id}', 'ProdutoController@alterar');

Route::put('/produtos/atualizar/{id}', 'ProdutoController@atualizar');

Route::get('/teste', 'ProdutoController@listaJson');