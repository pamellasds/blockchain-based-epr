<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //
    protected $table = 'user_is';
    protected $fillable = ['user_id','nome_js', 'addressNumber', 'addressContry','addressCity', 'addressCEP', 'addressState', 'nr_cnpj', 'nr_inscricao_conselho', 'nome_responsavel', 'nr_cpf_responsavel'];
}
