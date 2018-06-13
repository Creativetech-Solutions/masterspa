<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'comp_name','fname','lname','tel','cell','email','email_alt','address','city','state','zip','country','emerg_contact','emerg_phone','unique_id',
        'preference','special_need','specify_need','num_of_travlers','meeting_participants','extend_trip','european_dealer','airfare_quote','service_class',
        'dpt_city','dpt_date','pref_dpt_time','ret_date','pref_ret_time','pref_airline','freq_flyer_no','payment_method','special_notes','send_invoice','special_circumstances',
        'save_info','attendee_date_id','departure_date_id','arrival_date_id','attende_ext_night_id','status'
    ];
    public function attendees(){
        return $this->hasMany('App\Attendees');
    }
    public function country(){
        return $this->belongsTo('App\Register');
    }
    public function payment(){
        return $this->hasOne('App\Payments','req_id');
    }
}
