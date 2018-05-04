<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$counts = [
    		'users' => \App\User::count(),
    		'registrations' => \App\Register::count(),
    		'guests' => \App\Attendees::count(),
    	];
        return view('admin.home.dashboard')->with(compact('counts'));
    }
}
