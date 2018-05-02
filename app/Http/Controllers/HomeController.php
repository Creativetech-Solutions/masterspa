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
    public $register;
    public function __construct()
    {   
        if(!session()->has('register_id'))
            $this->register = new Register;
        else 
            $this->register = Register::find(session('register_id'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registration = $this->register;
        $pre   = 'index';
        return view('index')->with(compact('registration'));
    }

    public function getprefrences(Request $request)
    {   
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

            $register = $this->register;
            if(!session()->has('register_id')){
                $validation['email'] = 'required|unique:registers|max:191|same:re_email';
                $register->email = $request->email;
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
            if(!$register->save())
                return redirect('/');
            else 
                session()->put('register_id', $register->id);
        }
        $registration = $this->register;
        return view('prefrences')->with(compact('registration'));
    }

    public function getguests(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'needs' => 'required|max:191',
            ]);

            if ($validator->fails()) {
                return redirect('/prefrences')->withErrors($validator)->withInput();
            }

            $register = $this->register;
            $register->special_need = $request->needs;
            if(isset($request['preference']))
                $register->preference = $request->preference;

            if(!$register->save())
                return redirect('/prefrences');
            else 
                session()->put('register_id', $register->id);
        }

        $registration = $this->register;
        if(!empty($request->url))
            return redirect($request->url);

        return view('guests')->with(compact('registration'));
    }

    public function getadditional(Request $request)
    {

        if ($request->isMethod('post')) {
            $validation = [
                'num_of_travler' => 'required',
                'gfname' => 'required',
                'gbadgefname' => 'required',
                'gmiddle_name' => 'required',
                'glname' => 'required',
                'gshirtsize' => 'required',
            ];
            $validator = Validator::make($request->all(),$validation);
            if ($validator->fails()) {
                return redirect('/guests')->withErrors($validator)->withInput();
            }

            $register = $this->register;
            $register->num_of_travlers = $request->num_of_travler;
            if(!$register->save())
                return redirect('/guests');
            else{
                // delete extra if any
                $ids = $register->attendees()->pluck('id')->toArray();
                $extraIds = array_diff($ids, $request->attendie_ids);
                \App\Attendees::destroy($extraIds);

                session()->put('register_id', $register->id);

                foreach($request->gfname as $key => $val){
                    $attendieData = [
                        'fname' => $request->gfname[$key],
                        'badge_fname' => $request->gbadgefname[$key],
                        'middle_fname'  => $request->gmiddle_name[$key],
                        'lname'  => $request->glname[$key],
                        'tshirt_size' => $request->gshirtsize[$key]
                    ];
                    if(empty($request->attendie_ids[$key])){
                        // insert when new attendei
                        $register->attendees()->create($attendieData);    
                    } else {
                        // update attendie on base of id
                        $attendie = \App\Attendees::find($request->attendie_ids[$key])->update($attendieData);
                    }
                }

            }
        }
        if(!empty($request->url))
        return redirect($request->url);
  
        $registration = $this->register;
        return view('additional_attandees')->with(compact('registration'));
    }
    public function getmeeting(Request $request)
    {
        $registration = $this->register;
        if(!empty($request->url))
            return redirect($request->url);

        return view('meeting')->with(compact('registration'));
    }
    public function gethotel(Request $request)
    {
        if ($request->isMethod('post')) {

            $register = $this->register;
            $register->meeting_participants = $request->meeting;
            if(!$register->save())
                return redirect('/meeting');
            else 
                session()->put('register_id', $register->id);
        }
        $registration = $this->register;
        if(!empty($request->url))
            return redirect($request->url);

        return view('hotel')->with(compact('registration'));
    }

    public function getflights(Request $request)
    {
        $registration = $this->register;
        if(!empty($request->url))
            return redirect($request->url);

        return view('flights')->with(compact('registration'));
    }
    public function getagreement(Request $request)
    {

        if ($request->isMethod('post')) {
            $register = $this->register;
            $register->dpt_date = date('Y-m-d',strtotime($request->ddate));
            $register->dpt_city = $request->dcity;
            $register->pref_dpt_time = date('Y-m-d h:i:s',strtotime($request->pdtime));
            $register->ret_date = date('Y-m-d',strtotime($request->rdate));
            $register->pref_ret_time = date('Y-m-d h:i:s',strtotime($request->prtime));
            $register->pref_airline = $request->pairline;
            $register->freq_flyer_no = $request->fflyer;
            $register->special_notes = $request->snotes;
            // optional inputs
            $optionalInput = ['airfare_quote'=>'quote_airfare', 'service_class'=>'service', 'payment_method'=>'pay_method'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }

            if(!$register->save())
                return redirect('/flights');
            else 
                session()->put('register_id', $register->id);
        }

        $registration = $this->register;
        if(!empty($request->url))
            return redirect($request->url);

        return view('agreement')->with(compact('registration'));
    }

    public function submission(Request $request){


        if ($request->isMethod('post')) {
            $register = $this->register;
            $register->special_circumstances = $request->specialnotes;
            // optional inputs
            $optionalInput = ['send_invoice'=>'agreement', 'save_info'=>'save_info'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }

            if(!$register->save())
                return redirect('/agreement');
            else 
                session()->put('register_id', $register->id);
        }
        if(!empty($request->url))
            return redirect($request->url);

        return redirect('/');
    }



    public function getcontactus()
    {
        return view('contact_us');
    }
}
