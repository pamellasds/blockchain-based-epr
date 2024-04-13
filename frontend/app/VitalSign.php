<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    //
    protected $table = 'vital_sign';
    protected $fillable = ['observation_id', 'value', 'period_start','body_site','method'];
}
