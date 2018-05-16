<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendees extends Model
{
    //
    protected $fillable = [
        'fname', 'badge_fname', 'middle_fname', 'lname', 'age','tshirt_size'
    ];
    public function registration(){
        return $this->belongsTo('App\Register');
    }
}
