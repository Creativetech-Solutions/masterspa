<?php

namespace App\Http\Controllers\admin;

use App\Arrival_date;
use App\Attendee_date;
use App\Attendee_extended_night;
use App\Attendees;
use App\Country;
use App\Departure_date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class RegistrationController extends Controller
{
    public function index(){
    	$registrations = Register::all();
        return view('admin.registration.listing')->with(compact('registrations'));
    }
    public function getregister(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $register = Register::find($id);
            $register->comp_name = $request->cname;
            $register->fname = $request->cfname;
            $register->lname = $request->clname;
            $register->tel = $request->telephone;
            $register->cell = $request->cell;
            $register->email = $request->email;
            $register->email_alt = $request->email_alt;
            $register->address = $request->address;
            $register->city = $request->city;
            $register->state = $request->state;
            $register->zip = $request->zip;
            $register->country = $request->country;
            $register->emerg_contact = $request->emerg_contact;
            $register->emerg_phone = $request->emerg_phone;
            $register->preference = $request->preference;
            $register->special_need = $request->needs;
            $register->specify_need = $request->specify_need;
            $register->meeting_participants = $request->meeting;
            $register->extend_trip = $request->extend_trip;
            $register->european_dealer = $request->eur_dealer;
            $register->arrival_date_id = $request->arrival_date;
            $register->departure_date_id = $request->departure;
            $register->attende_ext_night_id = $request->extended_night;
            $register->airfare_quote = $request->quote_airfare;
            $register->service_class = $request->service;
            $register->dpt_city = $request->dcity;
            $register->pref_dpt_time = $request->pdtime;
            $register->ret_date = $request->rdate;
            $register->pref_ret_time = $request->prtime;
            $register->pref_airline = $request->pairline;
            $register->freq_flyer_no = $request->fflyer;
            $register->payment_method = $request->pay_method;
            $register->special_notes = $request->snotes;
            $register->special_circumstances = $request->specialnotes;

            $register->save();

            return redirect('admin/registrations');

        }
        $registration = Register::find($id);
        $additional_attendees = Attendee_date::all();
        $extended_nights = Attendee_extended_night::all();
        $departure_dates = Departure_date::all();
        $arrival_dates = Arrival_date::all();
        $countries = Country::all()->sortBy("name");
        return view('admin.registration.edit_form')->
        with(compact('registration','additional_attendees','extended_nights','departure_dates','arrival_dates','countries'));
    }
}
