<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRM extends Model
{
    //
    protected $table = 'CRM';
    protected $fillable = ['identifier','name','city', 'state'];
}
