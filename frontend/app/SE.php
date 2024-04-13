<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SE extends Model
{
    //
    protected $table = 'SE';
    protected $fillable = ['identifier','name','city', 'state'];
}
