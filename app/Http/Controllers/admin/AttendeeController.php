<?php

namespace App\Http\Controllers\admin;

use App\Attendees;
use App\Flights;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendeeController extends Controller
{
    public function index($id = "")
    {
        if($id == "")
            $guests = Attendees::all();
        else $guests = Attendees::where(['register_id'=>$id])->get();
        return view('admin.guests.attendee_listing')->with(compact('guests'));
    }
    public function editAttendee(Request $request, $id)
    {
        if($request->isMethod('post'))
        {
            $guest = Attendees::find($id);
            $guest->fname = $request->first_name;
            $guest->badge_fname = $request->badge_name;
            $guest->middle_fname = $request->middle_name;
            $guest->lname = $request->last_name;
            $guest->tshirt_size = $request->gshirtsize;
            $guest->age = $request->dob;
            $guest->save();
            return redirect('admin/guests');
        }
        $guest = Attendees::find($id);
        return view('admin.guests.edit_attendee')->with(compact('guest'));
    }

    public function delete(Request $req, $id){
        Attendees::find($id)->delete();
        return 'true';
    }

    public function getGuestFlight($id){
        $flights = Attendees::find($id)->flights;
       return view('admin.guests.flight_listing')->with(compact('flights'));
    }
    public function addGuestFlight(Request $request, $id){
        if($request->isMethod('post')) {
            $flight = new Flights();
            $flight->arrival_flight = $request->arrival_flight;
            $flight->arrival_time = $request->arrival_time;
            $flight->departure_flight = $request->departure_flight;
            $flight->departure_time = $request->departure_time;
            $flight->guest_id = $id;
            $flight->save();
            return redirect('admin/guests');
        }
    }
    public function getGuestFlightData($id){
        $f_data = Flights::find($id);
        return view('admin.guests.edit_guest_flights')->with(compact('f_data'));
    }
    public  function editGuestFlight(Request $request, $id){
        if($request->isMethod('post')){
            $flight = Flights::find($id);
            $flight->arrival_flight = $request->arrival_flight;
            $flight->arrival_time = $request->arrival_time;
            $flight->departure_flight = $request->departure_flight;
            $flight->departure_time = $request->departure_time;
            $flight->guest_id = $id;
            $flight->save();
            return redirect('admin/guests');
        }
    }
    public function deleteGuestFlight($id){
        Flights::find($id)->delete();
        return 'true';
    }
}
