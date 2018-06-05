<?php

namespace App\Http\Controllers;

use App\Arrival_date;
use App\Attendee_date;
use App\Attendee_extended_night;
use App\Attendees;
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
        $countries = Country::orderBy('ordering', 'DESC')->orderBy('name', 'ASC')->get();
        //dd($countries);
        return view('index')->with(compact('registration', 'countries'));
    }

    public function getprefrences(Request $request)
    {
       
        if ($request->isMethod('post')) {

            if($this->isEditable()){
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

                $register->european_dealer = $request->eur_dealer;
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

            if($this->isEditable()){

                $register = $this->register;
                if ($request->needs == 'yes') {
                    $register->specify_need = $request->specify_need;
                }
                $register->special_need = $request->needs;

                if (isset($request['preference']))
                    $register->preference = $request->preference;

                $register->hotel_check_in = $request->hotel_check_in;
                $register->hotel_check_out = $request->hotel_check_out;
                if (!$register->save())
                    return redirect('/prefrences');
                else
                    session()->put('register_id', $register->id);
            }

            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;

        return view('guests')->with(compact('registration'));
    }

 /* public function getadditional(Request $request)
    {
       
        if (empty(session('register_id'))) {
            return redirect('/');
        }
        if ($request->isMethod('post')) {

            $register = $this->register;
           
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
    }*/

    public function getmeeting(Request $request)
    {

        if (empty(session('register_id'))) {
            return redirect('/');
        }
        if ($request->isMethod('post')) {

            if($this->isEditable()){
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
            }

            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;
        return view('meeting')->with(compact('registration'));
    }

  /*  public function gethotel(Request $request)
    {
       
        if (empty(session('register_id'))) {
            return redirect('/');
        }
        if ($request->isMethod('post')) {
           
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
    }*/


    public function getflights(Request $request)
    {

        if (empty(session('register_id'))) {
            return redirect('/');
        }
        if ($request->isMethod('post')) {
            
            if($this->isEditable()){
                $register = $this->register;
                $register->meeting_participants = $request->meeting;
                if (!$register->save())
                    return redirect('/meeting');
                else
                    session()->put('register_id', $register->id);
            }
        }
        $registration = $this->register;
        if (!empty($request->url))
            return redirect($request->url);
        return view('flights')->with(compact('registration'));;
    }

    public function getagreement(Request $request)
    {
        if (empty(session('register_id'))) {
            return redirect('/');
        }
        if ($request->isMethod('post')) {
           
            if($this->isEditable()){
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

            }
            if (!empty($request->url))
                return redirect($request->url);
        }

        $registration = $this->register;
        $price_info = $this->calculatePrices($this->register);
        return view('agreement')->with(compact('registration','price_info'));
    }

    public function submission(Request $request)
    {
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
            $price_info = $this->calculatePrices($this->register);
            $country = Country::find($register->country);
            if (isset($country->name) && !empty($country->name)) {
                $country_name = $country->name;
            } else $country_name = "";
            /*echo $country_name; exit;*/
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
                'country' => $country_name,
                'emerg_contact' => $register->emerg_contact,
                'emerg_phone' => $register->emerg_phone,
                'dpt_city' => $register->dpt_city,
                'dpt_date' => $register->dpt_date,
                'pref_dpt_time' => $register->pref_dpt_time,
                'ret_date' => $register->ret_date,
                'pref_ret_time' => $register->pref_ret_time,
                'preference' => $register->preference,
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
                'hotel_check_in' => $status->hotel_check_in,
                'hotel_check_out' => $status->hotel_check_out,
                'status' => $status->status,
            );
            $template = Email_template::find(4);
            $html = \View::make('emails.complete_info_mail')->with(compact('complete_data','price_info'))->render();
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
                $guests_mail = $register->attendees()->first();
                if($guests_mail == ''){
                    $guests_mail->fname = '';
                    $guests_mail->lname = '';
                }
                $guests = $register->attendees;
                $count = 1;
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
                $template = Email_template::find(6);
                //dd($template->body);
                $html = \View::make('emails.reg_incomplete')->with(compact('av_data','guests','count'))->render();
                    $messageBody = str_replace(array('[BODY]', '[GuestFirstName]','[GuestLastName]','[GuestUniqueID]', '[SITE_NAME]'),
                    array($html, $guests_mail->fname,$guests_mail->lname,$register->unique_id, 'Master Spas'), $template->body);
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

    public function saveAndCompleteLater(Request $request)
    {
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
        $country = Country::find($register->country);
        if (isset($country->name) && !empty($country->name)) {
            $country_name = $country->name;
        } else $country_name = "";
        $guests = $register->attendees;
        $complete_data = array(
            'unique_id' => $register->unique_id,
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
            'country' => $country_name,
            'emerg_contact' => $register->emerg_contact,
            'emerg_phone' => $register->emerg_phone,
            'preference' => $register->preference,
            'special_need' => $register->special_need,
            'service_class' => $register->service_class,
            'dpt_city' => $register->dpt_city,
            'dpt_date' => $register->dpt_date,
            'pref_dpt_time' => $register->pref_dpt_time,
            'ret_date' => $register->ret_date,
            'pref_ret_time' => $register->pref_ret_time,
            'specify_need' => $register->specify_need,
            'meeting_participants' => $register->meeting_participants,
            'extend_trip' => $register->extend_trip,
            'european_dealer' => $register->european_dealer,
            'airfare_quote' => $register->airfare_quote,
            'send_invoice' => $register->send_invoice,
            'special_circumstances' => $register->special_circumstances,
            'pref_airline' => $register->pref_airline,
            'freq_flyer_no' => $register->freq_flyer_no,
            'payment_method' => $register->payment_method,
            'special_notes' => $register->special_notes,
            'status' => $status->status
        );
        $template = Email_template::find(4);
        $html = \View::make('emails.save_and_complete')->with(compact('complete_data','guests'))->render();
        $messageBody = str_replace(array('[BODY]', '[NAME]', '[SITE_NAME]'),
            array($html, $register->fname, 'Master Spas'), $template->body);
        $data = array('messageBody' => htmlspecialchars_decode($messageBody));
        $email_info = array(
            'email' => $register->email,
            'name' => $register->fname,
        );
        Mail::send('emails.show_temp', $data, function ($message) use ($email_info) {
            $message->to($email_info['email'], $email_info['name'])
                ->subject('Master Spas Registration Saved To Complete Later');
            $message->from('masterspa@yopmail.com', 'Master Spas');
        });
        return view('/information_saved');
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
        $countries = Country::orderBy('ordering', 'DESC')->orderBy('name', 'ASC')->get();
        $search = Input::get('unique_id');
        $registration = Register::where('unique_id', $search)->first();
        if (!empty($registration)) {
            session()->put('register_id', $registration->id);
            //redirect(back());
            return view('/index')->with(compact('registration', 'countries'))->withQuery($search);
        } else
            return view('/index')->with(compact('registration', 'countries'));

    }

    protected function calculatePrices($register){
      $htl_chkin = $register->hotel_check_in;
      $htl_chkout = $register->hotel_check_out;
      if($register->european_dealer == 'Yes') 
        $start = 1;
      else $start = 2;

      $num_of_days = $total_num_of_days = round((strtotime($htl_chkout) - strtotime($htl_chkin))/ (60 * 60 * 24))+1;

      for($i = $start; $i <= 5; $i++){
        $date = '2018-11-0'.$i;
        if (($date >= $htl_chkin) && ($date <= $htl_chkout)){
          $num_of_days -= 1;
        }
      }

      $prices = $guest_adult = $count = $above_five = $below_five = 0;
      foreach($register->attendees as $guest){
        $count++;

        $years = round((time()-strtotime($guest->age))/(3600*24*365.25));
        if($years >= 12)
          $guest_adult += 1;

        if ($count <= 2) continue;

        $guest_age_yr = date('Y', strtotime($guest->age));
        if($guest_age_yr >= 2013){
          $prices += 350;
          $below_five += 1;
        }
        else {
          $prices += 750;
          $above_five += 1;
        }
      }

      if($guest_adult == 2)
        $prices += 265.00 * $num_of_days;
      elseif($guest_adult == 3)
        $prices += 300.00 * $num_of_days;
      elseif($guest_adult == 4)
        $prices += 335.00 * $num_of_days;

      //$no_of_guests = $register->num_of_travlers;

      $priceInfo = [
        'num_of_days' => $num_of_days,
        'total_num_of_days' => $total_num_of_days,
        'adult' => $guest_adult,
        'prices' => $prices,
        'above_five' => $above_five,
        'below_five' => $below_five,
      ];

      return $priceInfo;
    }

    protected function isEditable(){
        $register = $this->register;
        if(isset($register->status) && $register->status != 'Registered')
            return true;
        else return false;
    }
}