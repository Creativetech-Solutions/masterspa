<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    public function attendees(){
        return $this->hasMany('App\Attendees');
    }
}
