<?php

namespace App\Http\Controllers;

use App\Arrival_date;
use App\Attendee_date;
use App\Attendee_extended_night;
use App\Country;
use App\Departure_date;
use App\Email_template;
use App\User;
use Illuminate\Http\Request;
use App\Register;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
        if (!session()->has('register_id')) {
            $this->register = new Register;
        } else {
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
        $countries = Country::all()->sortBy("name");
        //dd($countries);
        return view('index')->with(compact('registration', 'countries'));
    }

    public function getprefrences(Request $request)
    {
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
                /*unique:registers|*/
                $validation = ['email' => 'required|max:191'];
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
            if (empty($register->unique_id)) {
                $unique_id = uniqid();
                $register->unique_id = $unique_id;
            }
            if (!$register->save())
                return redirect('/');
            else {
                session()->put('register_id', $register->id);
            }
            if (!empty($request->url))
                return redirect($request->url);

        }
        $registration = $this->register;

        return view('prefrences')->with(compact('registration'));

    }

    public function getguests(Request $request)
    {
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
                        'tshirt_size' => $request->gshirtsize[$key],
                        'age' => $request->age[$key]
                    ];

                    if (empty($request->attendie_ids[$key])) {
                        // insert when new attendee
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
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
        if (empty(session('register_id'))) {
            return redirect('/');
        }
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
        if ($request->isMethod('get')) {
            $register = $this->register;
            $register->special_circumstances = $request->specialnotes;
            // optional inputs
            $optionalInput = ['send_invoice' => 'agreement', 'save_info' => 'save_info', 'need_invoice' => 'need_invoice'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }
            $update = array('status' => 'Pending');
            Register::find($register->id)->update($update);
            $status = Register::find($register->id);
            $complete_data = array(
                'comp_name' => $register->comp_name,
                'fname' => $register->fname,
                'lname' => $register->lname,
                'tel' => $register->tel,
                'cell' => $register->cell,
                'email' => $register->email,
                'email_alt' => $register->email_alt,
                'address' => $register->address,
                'city' => $register->city,
                'state' => $register->state,
                'zip' => $register->zip,
                'country' => $register->country,
                'emerg_contact' => $register->emerg_contact,
                'emerg_phone' => $register->emerg_phone,
                'dpt_city' => $register->dpt_city,
                'dpt_date' => $register->dpt_date,
                'pref_dpt_time' => $register->pref_dpt_time,
                'ret_date' => $register->ret_date,
                'pref_ret_time' => $register->pref_ret_time,
                'preference' => $register->country,
                'special_need' => $register->special_need,
                'specify_need' => $register->specify_need,
                'meeting_participants' => $register->meeting_participants,
                'extend_trip' => $register->extend_trip,
                'european_dealer' => $register->european_dealer,
                'airfare_quote' => $register->airfare_quote,
                'service_class' => $register->service_class,
                'pref_airline' => $register->pref_airline,
                'freq_flyer_no' => $register->freq_flyer_no,
                'payment_method' => $register->payment_method,
                'special_notes' => $register->special_notes,
                'status' => $status->status
            );
            $template = Email_template::find(4);
            $html = \View::make('emails.save_and_complete')->with(compact('complete_data'))->render();
            $messageBody = str_replace(array('[BODY]', '[NAME]', '[SITE_NAME]'),
                array($html, $register->fname, 'Master Spas'), $template->body);
            $data = array('messageBody' => htmlspecialchars_decode($messageBody));
            $email_info = array(
                'email' => $register->email,
                'name' => $register->fname,
            );
            Mail::send('emails.show_temp', $data, function ($message) use ($email_info) {
                $message->to($email_info['email'], $email_info['name'])
                    ->subject('Saved Form later');
                $message->from('masterspa@yopmail.com', 'Master Spas');
            });
            return view('/information_saved');
        }
        if ($request->isMethod('post')) {
            $register = $this->register;
            $register->special_circumstances = $request->specialnotes;
            // optional inputs
            $optionalInput = ['send_invoice' => 'agreement', 'save_info' => 'save_info', 'need_invoice' => 'need_invoice'];
            foreach ($optionalInput as $key => $value) {
                $register->$key = $request->$value;
            }
            $update = array('status' => 'Registered');
            Register::find($register->id)->update($update);
            $status = Register::find($register->id);
            $complete_data = array(
                'comp_name' => $register->comp_name,
                'fname' => $register->fname,
                'lname' => $register->lname,
                'tel' => $register->tel,
                'cell' => $register->cell,
                'email' => $register->email,
                'email_alt' => $register->email_alt,
                'address' => $register->address,
                'city' => $register->city,
                'state' => $register->state,
                'zip' => $register->zip,
                'country' => $register->country,
                'emerg_contact' => $register->emerg_contact,
                'emerg_phone' => $register->emerg_phone,
                'dpt_city' => $register->dpt_city,
                'dpt_date' => $register->dpt_date,
                'pref_dpt_time' => $register->pref_dpt_time,
                'ret_date' => $register->ret_date,
                'pref_ret_time' => $register->pref_ret_time,
                'preference' => $register->country,
                'special_need' => $register->special_need,
                'specify_need' => $register->specify_need,
                'meeting_participants' => $register->meeting_participants,
                'extend_trip' => $register->extend_trip,
                'european_dealer' => $register->european_dealer,
                'airfare_quote' => $register->airfare_quote,
                'service_class' => $register->service_class,
                'pref_airline' => $register->pref_airline,
                'freq_flyer_no' => $register->freq_flyer_no,
                'payment_method' => $register->payment_method,
                'special_notes' => $register->special_notes,
                'send_invoice' => $register->send_invoice,
                'special_circumstances' => $register->special_circumstances,
                'status' => $status->status,
            );
            $template = Email_template::find(4);
            $html = \View::make('emails.complete_info_mail')->with(compact('complete_data'))->render();
            $messageBody = str_replace(array('[BODY]', '[NAME]', '[SITE_NAME]'),
                array($html, $register->fname, 'Master Spas'), $template->body);
            $data = array('messageBody' => htmlspecialchars_decode($messageBody));
            $email_info = array(
                'email' => $register->email,
                'name' => $register->fname,
            );
            Mail::send('emails.show_temp', $data, function ($message) use ($email_info) {
                $message->to($email_info['email'], $email_info['name'])
                    ->subject('Master Spas Registration');
                $message->from('masterspa@yopmail.com', 'Master Spas');
            });
            /*$html = \View::make('emails.complete_info_mail')->render();
            $save = htmlspecialchars($html);
            dd($save);*/
            if ($register->airfare_quote == 'yes') {
                $av_data = array(
                    'comp_name' => $register->comp_name,
                    'fname' => $register->fname,
                    'lname' => $register->lname,
                    'tel' => $register->tel,
                    'cell' => $register->cell,
                    'email' => $register->email,
                    'address' => $register->address,
                    'city' => $register->city,
                    'state' => $register->state,
                    'zip' => $register->zip,
                    'country' => $register->country,
                    'emerg_contact' => $register->emerg_contact,
                    'emerg_phone' => $register->emerg_phone,
                    'dpt_city' => $register->dpt_city,
                    'dpt_date' => $register->dpt_date,
                    'pref_dpt_time' => $register->pref_dpt_time,
                    'ret_date' => $register->ret_date,
                    'pref_ret_time' => $register->pref_ret_time
                );
                $template = Email_template::find(1);
                $html = \View::make('emails.reg_incomplete')->with(compact('av_data'))->render();
                $messageBody = str_replace(array('[BODY]', '[NAME]', '[SITE_NAME]'),
                    array($html, $register->fname, 'Master Spas'), $template->body);
                $data = array('messageBody' => htmlspecialchars_decode($messageBody));
                $admin_email = User::find(2);
                $email_info = array(
                    'email' => $admin_email->email,
                    'name' => $admin_email->fname,
                );
                Mail::send('emails.show_temp', $data, function ($message) use ($email_info) {
                    $message->to($email_info['email'], $email_info['name'])
                        ->subject('Informed Admin');
                    $message->from('masterspa@yopmail.com', 'Master Spas');
                });
            }
            if (!$register->save()) {
                return redirect('/agreement');
            } else {
                if (!empty($request->url))
                    return redirect($request->url);

                session()->put('register_id', $register->id);

                $requriedFieldMissing = $this->isRequiredFieldMissing();

                $registration = $this->register;
                return view('/thankyou')->with(compact('registration', 'requriedFieldMissing'));
            }
        }
    }

    public function isRequiredFieldMissing()
    {
        $register = $this->register;
        $requiredFields = [
            'all' => ['comp_name', 'fname', 'lname', 'tel', 'cell', 'email', 'address', 'city', 'state', 'zip', 'country', 'emerg_contact', 'emerg_phone', 'preference', 'special_need', 'meeting_participants', 'airfare_quote'],
            'airfare_quote' => ['service_class', 'dpt_city', 'dpt_date', 'pref_dpt_time', 'ret_date', 'pref_ret_time', 'pref_airline', 'freq_flyer_no', 'payment_method', 'special_notes']
        ];
        foreach ($requiredFields as $key => $fields) {
            if ($key == 'all') {
                foreach ($fields as $field) {
                    if (empty($register->$field))
                        return 'true';
                }
            } else {
                if ($register->$key == 'yes') {
                    foreach ($fields as $field) {
                        if (empty($register->$field))
                            return 'true';
                    }
                }
            }
        }
        return 'false';
    }

    public function getcontactus()
    {
        return view('contact_us');
    }

    public function termsAndCondition()
    {
        return view('terms_and_conditions');
    }

    public function searchResult()
    {
        $countries = Country::all()->sortBy("name");
        $search = Input::get('unique_id');
        $registration = Register::where('unique_id', $search)->first();
        if (!empty($registration)) {
            session()->put('register_id', $registration->id);
            //redirect(back());
            return view('/index')->with(compact('registration', 'countries'))->withQuery($search);
        } else
            return view('/index')->withMessage('No Record found. Try to search again !');

    }
}