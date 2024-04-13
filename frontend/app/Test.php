<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $table = 'Test';
    protected $fillable = ['test_name','value', 'diagnostic_report_id'];
}
