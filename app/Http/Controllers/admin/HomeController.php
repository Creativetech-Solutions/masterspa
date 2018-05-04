<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.dashboard');
    }

    public function getprofile(Request $request)
    {
        if ($request->isMethod('post')) {
            $userdata = Auth::user();
            $userdata->name = $request->user_name;
            $userdata->email = $request->email;
            if (!empty($request->password)) {
                $userdata->password = $request->password;
            }
            $userdata->save();

            return redirect('admin/user');

        }
        $userprofile = \Auth::user();
        return view('admin.profile.form')->with(compact('userprofile'));
    }
}
