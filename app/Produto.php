<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Especifica quais atributos podem ser populados
    //protected $fillable = array('nome', 'descricao', 'valor', 'quantidade');
    protected $guarded = ['_token', '_method'];
}
