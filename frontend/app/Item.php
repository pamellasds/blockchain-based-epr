<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'item';
    protected $fillable = ['questionnaire_response_id', 'question', 'anwser'];
}
