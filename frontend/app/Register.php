<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    protected $table = 'register';
    protected $fillable = ['id','register_type', 'user_patient_id', 'user_id'];
}
