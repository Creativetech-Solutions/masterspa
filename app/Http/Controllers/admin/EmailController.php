<?php

namespace App\Http\Controllers\admin;

use App\Email_template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function index(){
        $emails = Email_template::all();
        return view('admin.emails.email_listing')->with(compact('emails'));
    }
    public function getemail(){

    }
}
