<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Especifica quais atributos podem ser populados
    protected $fillable = array('nome', 'descricao', 'valor', 'quantidade');
    //protected $guarded = ['_token', '_method'];

    // Não guarda na tabela a data de criação e atuaização
    public $timestamps = false;

}
