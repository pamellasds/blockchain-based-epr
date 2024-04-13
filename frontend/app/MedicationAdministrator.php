<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationAdministrator extends Model
{
    //
    protected $table = 'medication_administrator';
    protected $fillable = ['register_id', 'status', 'id_patient', 'period_start', 'period_end', 'id_ee', 'dousage_text', 'dousage_route','dousage_method','dousage_rate'];
}
