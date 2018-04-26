<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use Validator;

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
        $registration = [];
        if(session()->has('register_id')){
            $registration = Register::find(session()->get('register_id'));
        }
        return view('index')->with(compact('registration'));
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
     public function getprefrences(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $validation = [
                'cname' => 'required|max:191',
                'cfname' => 'required|max:191',
                'clname' => 'required|max:191',
                'tphone' => 'required|max:191',
                'cellphone' => 'required|max:191',
                'email_alt' => 'required|max:191|same:re_email_alt',
                'address' => 'required|max:191',
                'city' => 'required|max:191',
                'region' => 'required|max:191',
                'pcode' => 'required|max:191',
                'country' => 'required|max:191',
                'emerg_contact' => 'required|max:191',
                'emerg_phone' => 'required|max:191',
            ];

            if(!session()->has('register_id')){
                $validation['email'] = 'required|unique:registers|max:191|same:re_email';
                $register = new Register;
                $register->email = $request->email;
            } else {
                $register = Register::find(session()->get('register_id'));
            }
            $validator = Validator::make($request->all(),$validation);

            if ($validator->fails()) {
                return redirect('/')->withErrors($validator)->withInput();
            }

            $register->comp_name = $request->cname;
            $register->fname = $request->cfname;
            $register->lname = $request->clname;
            $register->tel = $request->tphone;
            $register->cell = $request->cellphone;
            $register->email_alt = $request->email_alt;
            $register->address = $request->address;
            $register->city = $request->city;
            $register->state = $request->region;
            $register->zip = $request->pcode;
            $register->country = $request->country;
            $register->emerg_contact = $request->emerg_contact;
            $register->emerg_phone = $request->emerg_phone;
            if($register->save()){
                session()->put('register_id', $register->id);
                return view('prefrences');
            } else {
                return redirect('/');
            }
        }
        else {
            return view('prefrences');
        }

    }
    public function getguests(Request $request)
    {  
        $method = $request->method();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'needs' => 'required|max:191',
            ]);

            if ($validator->fails()) {
                return redirect('/prefrences')->withErrors($validator)->withInput();
            }

            $register = new Register;
            $register->comp_name = $request->cname;
            if($register->save()){
                return view('guests');
            } else {
                return redirect('/prefrences');
            }
        }
        else {
            return view('guests');
        }
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
