<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'user_patient';
    protected $fillable = ['user_id', 'nome', 'cpf', 'rg', 'contactRelationship', 'contactName', 'contactStreet', 'contactNumber', 
    'contactCity', 'addressNumber', 'addressContry','addressCity', 'addressCEP', 'addressState', 'maritalStatus', 'gender', 'birthDate', 'language'];
}
