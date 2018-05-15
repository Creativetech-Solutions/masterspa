<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportchecks extends Model
{
    //
    protected $table = 'report_checkboxes';

    protected $fillable = ['name','type'];
}
