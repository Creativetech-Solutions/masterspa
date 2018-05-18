<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    	$counts = [
    		'users' => \App\User::count(),
    		'registrations' => \App\Register::count(),
    		'guests' => \App\Attendees::count(),
            'reports' => \App\Reportchecks::count()
    	];
        return view('admin.home.dashboard')->with(compact('counts'));
    }

    public function getprofile(Request $request)
    {
        if ($request->isMethod('post')) {
            $userdata = Auth::user();
            $userdata->name = $request->user_name;
            $userdata->email = $request->email;
            if (!empty($request->password)) {
                $userdata->password = bcrypt($request->password);
            }
            $userdata->save();

            return redirect('admin/user');

        }
        $userprofile = \Auth::user();
        return view('admin.profile.form')->with(compact('userprofile'));
    }
}
