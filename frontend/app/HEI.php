<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HEI extends Model
{
    //
    protected $table = 'HEI';
    protected $fillable = ['identifier','name','city', 'state'];
}
