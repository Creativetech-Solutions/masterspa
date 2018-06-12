<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    public function register(){
        return $this->belongsTo('App\Register','reg_id');
    }
}
