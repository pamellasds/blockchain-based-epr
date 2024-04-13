<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    //
    protected $table = 'diagnostic_report';
    protected $fillable = ['register_id', 'status', 'id_patient', 'period_start', 'period_end', 'id_ee', 'media_link', 'media_text'];
}
