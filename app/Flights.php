<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    protected $fillable = [
        'arrival_flight', 'arrival_time', 'depature_flight', 'depature_time', 'guest_id'
    ];
    public function guest(){
        return $this->belongsTo('App\Attendees');
    }
}
