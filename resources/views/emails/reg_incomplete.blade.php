<h3>Personal Information</h3>
<table style="font-family: Arial, Sans-Serif; border-collapse: collapse; width: 50% ">
    <tr>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Field Name</th>
        <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Details</th>
    </tr>

    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Company Name:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['comp_name']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">First Name</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['fname']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Last Name:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['lname']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Telephone</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['tel']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Cell phone:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['cell']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Email:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['email']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Address:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['address']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">City:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['city']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">State:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['state']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Zip</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['zip']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Country:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['country']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Emergency Contact</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['emerg_contact']}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Emergency Phone:</td>
        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['emerg_phone']}}</td>
    </tr>
</table>
<table>
    <tr>
        <tb>
            <h3>Flights</h3>
            <table style="font-family: Arial, Sans-Serif; border-collapse: collapse; width: 50% ">
                <tr>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Field Name</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Details</th>
                </tr>

                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Departure City:</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['dpt_city']}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Departure Date:</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['dpt_date']}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Departure Time:
                    </td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['pref_dpt_time']}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Return Date:</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['ret_date']}}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Preferred Return Time:</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$av_data['pref_ret_time']}}</td>
                </tr>
            </table>
        </tb>
    </tr>
</table>
<table>
    <tr>
        <tb>
            <h3>Guests</h3>
            <table style="font-family: Arial, Sans-Serif; border-collapse: collapse; width: 50% ">
                <tr>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Field Name</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Your Details</th>
                </tr>
                @foreach($guests as $guest)
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest {{$count}} Name :</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['badge_fname'].' '.$guest['middle_fname'].' '.$guest['lname']}}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest {{$count}} D.O.B:</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['age']}}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Guest {{$count}} Size :</td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{$guest['tshirt_size']}}</td>
                    </tr>
                    $count++;
                @endforeach
            </table>
        </tb>
    </tr>
</table>
