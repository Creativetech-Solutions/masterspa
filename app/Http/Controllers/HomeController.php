<?php

namespace App\Http\Controllers;

use App\Arrival_date;
use App\Attendee_date;
use App\Attendee_extended_night;
use App\Departure_date;
use Illuminate\Http\Request;
use App\Register;
use Illuminate\Support\Facades\App;
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
        if (!session()->has('register_id'))
            $this->register = new Register;
        else {
            if (empty($this->register = Register::find(session('register_id')))) {
                $this->register = new Register();
            } else {
                $this->register = Register::find(session('register_id'));
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registration = $this->register;
        $pre = 'index';
        $countries = \App\Country::all()->sortBy("name");;
        return view('index')->with(compact('registration', 'countries'));
    }

    public function getprefrences(Request $request)
    {

        if ($request->isMethod('post')) {
          /*  $messages = [
                'cname.required' => 'The Company Name field is required.',
                'cfname.required' => 'The Contact First Name field is required.',
                'clname.required' => 'The Contact Last Name field is required.',
                'tphone.required' => 'The Telephone field is required.',
                'cellphone.required' => 'The Cell phone field is required.',
                'address.required' => 'The Address field is required.',
                'city.required' => 'The City field is required.',
                'region.required' => 'The Region field is required.',
                'pcode.required' => 'The Zip Code field is required.',
                'country.required' => 'The Country field is required.',
                'emerg_contact.required' => 'The Emergency Contact field is required.',
                'emerg_phone.required' => 'The Emergency Phone field is required.',
            ];
            $validation = [
                'cname' => 'required|max:191',
                'cfname' => 'required|max:191',
                'clname' => 'required|max:191',
                'tphone' => 'required|max:191',
                'cellphone' => 'required|max:191',
                'address' => 'required|max:191',
                'city' => 'required|max:191',
                'region' => 'required|max:191',
                'pcode' => 'required|max:191',
                'country' => 'required|max:191',
                'emerg_contact' => 'required|max:191',
                'emerg_phone' => 'required|max:191',
            ];*/

            $register = $this->register;
            if (!session()->has('register_id')) {
                $validation = ['email'=>'required|unique:registers|max:191'];
                $register->email = $request->email;
                $validator = Validator::make($request->all(), $validation);
                if ($validator->fails()) {
                    return redirect('/')->withErrors($validator)->withInput();
                }
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
            if (!$register->save())
                return redirect('/');
            else
                session()->put('register_id', $register->id);

            if (!empty($request->url))
                return redirect($request->url);

        }
        $registration = $this->register;

        return view('prefrences')->with(compact('registration'));

    }

    public function getguests(Request $request)
    {
        if ($request->isMethod('post')) {
            /*if($request->special_need == 'yes')
            {
                $message = [
                  'specify_need.required' => 'Please Specify your need',
                ];
                $validation = [
                    'specify_need' => 'required'
                ];
            }else
                {
                    $message = [
                        'needs.required' => 'The Special check is required',
                    ];
                    $validation = [
                        'needs' => 'required|max:191',
                    ];
                }
            $validator = Validator::make($request->all(), [
                $validation,
                $message
            ]);

            if ($validator->fails()) {
                return redirect('/prefrences')->withErrors($validator)->withInput();
            }*/

            $register = $this->register;
            if ($request->needs == 'yes') {
                $register->specify_need = $request->specify_need;
            }
            $register->special_need = $request->needs;

            if (isset($request['preference']))
                $register->preference = $request->preference;

            if (!$register->save())
                return redirect('/prefrences');
            else
                session()->put('register_id', $register->id);


            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;

        return view('guests')->with(compact('registration'));
    }

    public function getadditional(Request $request)
    {
        if ($request->isMethod('post')) {
           /* $messages = [
                'gfname.required' => 'The Attendee First Name field is required.',
                'gbadgefname.required' => 'The Badge Name field is required.',
                'gmiddle_name.required' => 'The Middle Name field is required.',
                'glname.required' => 'The Last Name field is required.',
                'gshirtsize.required' => 'The T-Shirt Size field is required.'
            ];
            $validation = [
                'num_of_travler' => 'required',
                'gfname' => 'required',
                'gbadgefname' => 'required',
                'gmiddle_name' => 'required',
                'glname' => 'required',
                'gshirtsize' => 'required',
            ];
            $validator = Validator::make($request->all(), $validation, $messages);
            if ($validator->fails()) {
                return redirect('/guests')->withErrors($validator)->withInput();
            }
*/
            $register = $this->register;
            $register->num_of_travlers = $request->num_of_travler;
            if (!$register->save())
                return redirect('/guests');
            else {
                // delete extra if any
                $ids = $register->attendees()->pluck('id')->toArray();
                $extraIds = array_diff($ids, $request->attendie_ids);
                \App\Attendees::destroy($extraIds);

                session()->put('register_id', $register->id);

                foreach ($request->gfname as $key => $val) {
                    $attendieData = [
                        'fname' => $request->gfname[$key],
                        'badge_fname' => $request->gbadgefname[$key],
                        'middle_fname' => $request->gmiddle_name[$key],
                        'lname' => $request->glname[$key],
                        'tshirt_size' => $request->gshirtsize[$key]
                    ];

                    if (empty($request->attendie_ids[$key])) {
                        // insert when new attendei
                        $register->attendees()->create($attendieData);
                    } else {
                        // update attendie on base of id
                        $attendie = \App\Attendees::find($request->attendie_ids[$key])->update($attendieData);
                    }
                }

            }
            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;
        $additional_attendees = Attendee_date::all();
        return view('additional_attandees')->with(compact('registration', 'additional_attendees'));
    }

    public function getmeeting(Request $request)
    {
        if ($request->isMethod('post')) {
            /*$validation = [
                'attandees' => 'required'
            ];*/

            $register = $this->register;
            /*$validator = Validator::make($request->all(),$validation);
            if ($validator->fails()) {
                return redirect('/additional')->withErrors($validator)->withInput();
            }*/
            $register->attendee_date_id = $request->attandees;
            if (!$register->save())
                return redirect('/');
            else
                session()->put('register_id', $register->id);

            if (!empty($request->url))
                return redirect($request->url);
        }
        $registration = $this->register;

        return view('meeting')->with(compact('registration'));
    }

    public function gethotel(Request $request)
    {
        if ($request->isMethod('post')) {
           /* $message = [
                'meeting.required' => 'The Meeting field is required.'
            ];

            $validation = [
                'meeting' => 'required'
            ];

            $validator = Validator::make($request->all(), $validation, $message);
            if ($validator->fails()) {
                return redirect('/meeting')->withErrors($validator)->withInput();
            }*/
            $register = $this->register;
            $register->meeting_participants = $request->meeting;
            if (!$register->save())
                return redirect('/meeting');
            else
                session()->put('register_id', $register->id);
        }
        $registration = $this->register;
        if (!empty($request->url))
            return redirect($request->url);
        $extended_nights = Attendee_extended_night::all();
        $departure_dates = Departure_date::all();
        $arrival_dates = Arrival_date::all();
        return view('hotel')->with(compact('registration', 'extended_nights', 'departure_dates', 'arrival_dates'));
    }


    public function getflights(Request $request)
    {
        if ($request->isMethod('post')) {
            /* if ($request->eur_dealer == 'yes') {
               $messages = [
                    'arrival_date.required' => 'The Arrival date Check is required.',
                    'departure.required' => 'The Departure Date Check is required.',
                    'extended_night.required' => 'The Extended Nights Check is required.',
                    'extend_trip.required' => 'The Extended trip field is required.',
                    'eur_dealer.required' => 'The EU Dealer Check is required.'
                ];
                $validation = [
                    'arrival_date' => 'required',
                    'departure' => 'required',
                    'extended_night' => 'required',
                    'extend_trip' => 'required',
                    'eur_dealer' => 'required',
                ];

            } else {
                $messages = [
                    'arrival_date.required' => 'The Arrival date Check is required.',
                    'extend_trip.required' => 'The Extended trip field is required.',
                    'eur_dealer.required' => 'The EU Dealer Check is required.'
                ];
                $validation = [
                    'arrival_date' => 'required',
                    'extend_trip' => 'required',
                    'eur_dealer' => 'required'
                ];
            }
            $validator = Validator::make($request->all(), $validation, $messages);
            if ($validator->fails()) {
                return redirect('/hotel')->withErrors($validator)->withInput();
            }

*/
            $register = $this->register;
            $register->arrival_date_id = $request->arrival_date;
            $register->departure_date_id = $request->departure;
            $register->attende_ext_night_id = $request->extended_night;
            $register->extend_trip = $request->extend_trip;
            $register->european_dealer = $request->eur_dealer;
            if (!$register->save())
                return redirect('/hotel');
            else
                session()->put('register_id', $register->id);
        }
        $registration = $this->register;
        if (!empty($request->url))
            return redirect($request->url);

        return view('flights')->with(compact('registration'));
    }

    public function getagreement(Request $request)
    {
        if ($request->isMethod('post')) {
           /* if ($request->quote_airfare == 'yes') {
                $messages = [
                    'dcity.required' => 'The Departure City field is required.',
                    'ddate.required' => 'The Date field is required.',
                    'pdtime.required' => 'The Preferred departure field is required.',
                    'rdate.required' => 'The Returned date field is required.',
                    'prtime.required' => 'The Preferred returned field is required.',
                    'pairline.required' => 'The Preferred airline field is required.',
                    'fflyer.required' => 'The Frequent flayer field is required.',
                    'pay_method.required' => 'The Payment Method  is required.',
                    'service.required' => 'The Class of service is required.',
                    'snotes.required' => 'The Special Note field is required.'
                ];
                $validation = [
                    'dcity' => 'required',
                    'ddate' => 'required',
                    'pdtime' => 'required',
                    'rdate' => 'required',
                    'prtime' => 'required',
                    'pairline' => 'required',
                    'fflyer' => 'required',
                    'pay_method' => 'required',
                    'service' => 'required',
                    'snotes' => 'required'
                ];
            } else {

                $validation = [
                    'quote_airfare' => 'required',
                ];
                $messages = [
                    'quote_airfare.required' => 'The quote_airfare field is required.',
                ];
            $validator = Validator::make($request->all(), $validation, $messages);
            if ($validator->fails()) {
                return redirect('/flights')->withErrors($validator)->withInput();
            }
            }*/

            $register = $this->register;
            $register->dpt_date = date('Y-m-d', strtotime($request->ddate));
            $register->dpt_city = $request->dcity;
            $register->pref_dpt_time = date('Y-m-d h:i:s', strtotime($request->pdtime));
            $register->ret_date = date('Y-m-d', strtotime($request->rdate));
            $register->pref_ret_time = date('Y-m-d h:i:s', strtotime($request->prtime));
            $register->pref_airline = $request->pairline;
            $register->freq_flyer_no = $request->fflyer;
            $register->special_notes = $request->snotes;
            // optional inputs
            $optionalInput = ['airfare_quote' => 'quote_airfare', 'service_class' => 'service', 'payment_method' => 'pay_method'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }

            if (!$register->save())
                return redirect('/flights');
            else
                session()->put('register_id', $register->id);


            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;

        return view('agreement')->with(compact('registration'));
    }

    public function submission(Request $request)
    {


        if ($request->isMethod('post')) {
            $register = $this->register;
            $register->special_circumstances = $request->specialnotes;
            // optional inputs
            $optionalInput = ['send_invoice' => 'agreement', 'save_info' => 'save_info'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }

            if (!$register->save())
                return redirect('/agreement');
            else{
                if (!empty($request->url))
                    return redirect($request->url);

                session()->put('register_id', $register->id);
                
                $requriedFieldMissing = $this->isRequiredFieldMissing();
                

                $registration = $this->register;
                return view('/thankyou')->with(compact('registration', 'requriedFieldMissing'));
            }
        }

    }


    public function isRequiredFieldMissing(){
        $register = $this->register;
        $requiredFields = [
                'comp_name','fname','lname','tel','cell','email','address','city','state','zip','country','emerg_contact','emerg_phone','preference','special_need','meeting_participants','airfare_quote','service_class','dpt_city','dpt_date','pref_dpt_time','ret_date','pref_ret_time','pref_airline','freq_flyer_no','payment_method','special_notes'
        ];
        foreach($requiredFields as $field){
            if(empty($register->$field))
                return 'true';
        }
        return 'false';
    }

    public function getcontactus()
    {
        return view('contact_us');
    }
}

