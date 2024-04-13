<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    //
    protected $table = 'medical_accesses';
    protected $fillable = ['id_register', 'id_patiente', 'id_doctor'];
}
