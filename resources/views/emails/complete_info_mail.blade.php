<h2>Thank you For Registering with Master Spas</h2>
<h3>Complete registered Information</h3>
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
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['specify_need']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Meeting Participants:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['meeting_participants']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">European Dealer:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['european_dealer']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Air Qoute:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['airfare_quote']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Service Class:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['service_class']}}</td>
    </tr><tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Departure City:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['dpt_city']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Departure Date & Time:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['dpt_date'] .' '.$complete_data['pref_dpt_time']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Return Date & Time:</td>
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
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Special Notes:</td>
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
    @php $count = 1 @endphp
    @foreach($guests as $guest)
        <tr>
            <td colspan="2" style="border: 1px solid #dddddd; text-align: left; padding: 8px;font-weight:bold">Guest {{ $count }}</td>
        </tr>
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
        @php $count++ @endphp
    @endforeach
</table>
<h3>Price Details</h3>
<table>
    <tr>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Field Name</th>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Details</th>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Hotel Check In :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['hotel_check_in']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Hotel Check Out :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['hotel_check_out']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Total Hotel Nights :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $price_info['total_num_of_days']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Included Hotel Nights :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $price_info['total_num_of_days'] - $price_info['num_of_days']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Additional Nights :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$price_info['num_of_days']}} @ $265.00 per night</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Total Attendee</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$complete_data['num_of_travlers']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Adults :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $price_info['adult']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Additional Attendees :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $price_info['above_five']}} @ $750.00 for everyone over 5</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Below 5 Years :</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $price_info['below_five']}} @ $350.00 per child</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Total Price:<strong></strong></td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>${{ $price_info['prices']}}</strong></td>
    </tr>
</table>
<hr>