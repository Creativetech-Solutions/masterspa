<h2>Thank you For Registering with Master Spas</h2>
<h3>Thank you for beginning your registration. Please note that your Registration ID is {{$complete_data['unique_id']}}.
    Please find below a copy of your current registration:</h3>
<table style="font-family: Arial, Sans-Serif; border-collapse: collapse; width: 50% ">
    <tr>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Field Name</th>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Details</th>
    </tr>

    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Company Name:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['comp_name']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['fname'].' '.$complete_data['lname']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Telephone</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['tel']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Cell phone:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['cell']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Email:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['email']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Alternative Email:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['email_alt']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Emergency Contact</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['emerg_contact']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Address:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['address'] .' - '.$complete_data['city'].' - '. $complete_data['state'] .' - '.$complete_data['zip'].' - '.$complete_data['country']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preference:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['preference']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Special Need:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['special_need']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Meeting Participants:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['meeting_participants']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Extend Trip:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['extend_trip']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">European Dealer:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['european_dealer']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Quote:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['airfare_quote']}}</td>
    </tr>
    @if($complete_data['airfare_quote'] == 'yes')
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Service Class:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['service_class']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Departure City:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['dpt_city']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Departure Date Time:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['dpt_date'] .' '.$complete_data['pref_dpt_time']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Return Date Time:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['ret_date'] .' '.$complete_data['pref_ret_time']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Airline:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['pref_airline']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Frequent Flyer number:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['freq_flyer_no']}}</td>
        </tr>
    @endif
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Payment Method:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['payment_method']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Special Circumstances:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['special_notes']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Send invoice:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['send_invoice']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Special Circumstances:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['special_circumstances']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Status:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['status']}}</td>
    </tr>
    @foreach($guests as $guest)
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest Name:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['badge_fname'].' '.$guest['middle_fname'].' '.$guest['lname']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest D.O.B:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['age']}}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest Size:</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['tshirt_size']}}</td>
        </tr>
        @endforeach
</table>
</tr>
