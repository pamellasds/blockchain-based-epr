<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    //
    protected $table = 'user_ee_register';
    protected $fillable = ['user_ps', 'user_is', 'user_lm'];
}
