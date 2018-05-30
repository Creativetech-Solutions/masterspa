<?php

namespace App\Console\Commands;

use App\Email_template;
use App\Register;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class ReminderToCompleteRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Reminder:IncompleteRegistrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail to Incomplete Registered user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pending_registrations = Register::where('status', 'Pending')->get();
        $required_fields = [
            'comp_name' => "Company Name",
            'fname' => "First Name",
            'lname' => "Last Name",
            'tel' => "Telephone",
            'cell' => "Cellphone",
            'email' => "Email",
            'address' => "Address",
            'city' => "City",
            'state' => "State",
            'zip' => "Zip",
            'country' => "Country",
            'emerg_contact' => "Emergence Contact",
            'emerg_phone' => "Emergence Phone",
            'preference' => "Preference",
            'special_need' => "Special Need",
            'meeting_participants' => "Meeting Participants",
            'airfare_quote' => "Airfare Quote",

        ];
        $flight_required_fields = [
            'service_class' => "Service Class",
            'dpt_city' => "Departure City",
            'dpt_date' => "Departure Date",
            'pref_dpt_time' => "Preferred Departure Time",
            'ret_date' => "Return Date",
            'pref_ret_time' => "Preferred Return Time",
            'pref_airline' => "Preferred Airline",
            'payment_method' => "Payment Method",
            'special_notes' => "Special Notes"
        ];
        foreach ($pending_registrations as $key => $p_registration) {
            $var = array();
            foreach ($required_fields as $k => $req) {
                if (empty($p_registration->$k)) {
                    array_push($var, $req);
                }
            }

            if ($p_registration->airfare_quote == "yes") {
                foreach ($flight_required_fields as $k => $flight_req) {
                    if (empty($p_registration->$k)) {
                        array_push($var, $req);
                    }
                }
            }
            //dd($var);
            $template = Email_template::find(5);
            //dd($template->body);
            $html = \View::make('emails.cron_reg')->with(compact('var'))->render();
            $html = htmlspecialchars($html);
            $messageBody = str_replace(array('[BODY]', '[NAME]', '[SITE_NAME]'),
                array($html, $p_registration->fname, 'Master Spas'), $template->body);
            $data = array('messageBody' => htmlspecialchars_decode($messageBody));
            $email_info = array(
                'email' => $p_registration->email,
                'name' => $p_registration->fname,
            );
            Mail::send('emails.show_temp', $data, function ($message) use ($email_info) {
                $message->to($email_info['email'], $email_info['name'])
                    ->subject('Master Spas Registration');
                $message->from('masterspa@yopmail.com', 'Master Spas');
            });
        }
    }
}
