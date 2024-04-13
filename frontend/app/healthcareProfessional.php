<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class healthcareProfessional extends Model
{
    //
    protected $table = 'user_ps';
    protected $fillable = ['user_id', 'nome', 'cpf', 'rg', 'addressStreet', 'addressNumber', 'addressContry', 'addressState', 
    'gender', 'birthDate', 'qualificationIdentifier', 'qualificationName', 'qualificationDate','speciality'];
}
