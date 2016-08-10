<?php

Route::get('/', function () {
    return "<h1>Página inicial do site</h1>";
});

Route::get('/sobre', function () {
    return "Informações sobre o site";
});

Route::get('/contato', function () {
    return "Página de contato do site";
});

Route::get('/produtos', 'ProdutoController@lista');