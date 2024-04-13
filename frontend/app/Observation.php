<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    //
    protected $table = 'observation';
    protected $fillable = ['register_id','status', 'id_patient', 'period_start', 'period_end'];
}
