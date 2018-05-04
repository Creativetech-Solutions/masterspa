<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class RegistrationController extends Controller
{
    public function index(){
    	$registrations = Register::all();
        return view('admin.registration.listing')->with(compact('registrations'));
    }
}
