<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee_date extends Model
{
    protected $fillable = [
        'attendee_date', 'rate'
    ];

    public function registration(){
        return $this->belongsTo('App\Register');
    }
}
