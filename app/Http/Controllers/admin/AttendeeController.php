<?php

namespace App\Http\Controllers\admin;

use App\Attendees;
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
            $guest->save();
            return redirect('admin/guests');
        }
        $guest = Attendees::find($id);
        return view('admin.guests.edit_attendee')->with(compact('guest'));
    }
}
