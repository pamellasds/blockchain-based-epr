<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $table = 'questionnaire_response';
    protected $fillable = ['register_id', 'status', 'id_patient', 'period_start', 'period_end', 'id_ee'];
}
