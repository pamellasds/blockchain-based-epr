<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    //
    protected $table = 'user_lm';
    protected $fillable = ['user_id','nome_js', 'addressNumber', 'addressContry','addressCity', 'addressCEP', 'addressState', 'nr_cnpj', 'nr_inscricao_conselho', 'nome_responsavel', 'nr_cpf_responsavel'];
}
