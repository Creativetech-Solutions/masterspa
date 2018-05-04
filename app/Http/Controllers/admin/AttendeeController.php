<?php

namespace App\Http\Controllers\admin;

use App\Attendees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendeeController extends Controller
{
    public function index()
    {
            $guests = Attendees::all();
            return view('admin.guests.attendee_listing')->with(compact('guests'));
    }
}
