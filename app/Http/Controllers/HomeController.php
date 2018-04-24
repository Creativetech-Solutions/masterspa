<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');

    }
    public function getadditional()
    {
        return view('additional_attandees');
    }
     public function getagreement()
    {
        return view('agreement');
    }
     public function gethotel()
    {
        return view('hotel');
    }
     public function getprefrences()
    {
        return view('prefrences');
    }
     public function getguests()
    {
        return view('guests');
    }
     public function getflights()
    {
        return view('flights');
    }
     public function getcontactus()
    {
        return view('contact_us');
    }
     public function getmeeting()
    {
        return view('meeting');
    }
}
