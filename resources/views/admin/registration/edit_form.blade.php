@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Register
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="#">Register</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="{{url('admin/registration/edit_form/'.$registration->id)}}" method="post">
                            {{ csrf_field() }}
                            <h3>Personal Details</h3>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Company Name:</label>
                                    <input type="text" class="form-control" name="cname"
                                           value="{{ $registration->comp_name }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Contact First Name:</label>
                                    <input type="text" class="form-control" name="cfname"
                                           value="{{ $registration->fname }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Last Name:</label>
                                    <input type="text" class="form-control" name="clname"
                                           value="{{ $registration->lname }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Telephone:</label>
                                    <input type="text" class="form-control" name="telephone"
                                           value="{{ $registration->tel }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cell Phone for Reaching Attendee When Traveling:</label>
                                    <input type="text" class="form-control" name="cell"
                                           value="{{ $registration->cell }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <input type="text" class="form-control" name="email"
                                           value="{{ $registration->email }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Second Email:</label>
                                    <input type="text" class="form-control" name="email_alt"
                                           value="{{ $registration->email_alt }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control" name="address"
                                           value="{{ $registration->address }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>City:</label>
                                    <input type="text" class="form-control" name="city"
                                           value="{{ $registration->city }}"
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>State:</label>
                                    <input type="text" class="form-control" name="state"
                                           value="{{ $registration->state }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Zip:</label>
                                    <input type="text" class="form-control" name="zip" value="{{ $registration->zip }}"
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Emergency Contact: </label>
                                    <input type="text" class="form-control" name="emerg_contact"
                                           value="{{ $registration->emerg_contact }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <select name="country" class="form-control">
                                        <option value="0">Select Country</option>
                                        {{print_r($countries)}}
                                        @foreach($countries as $key => $country)

                                            <option
                                                    value="{{$country->id}}"{{ $registration->country ==  $country->id ? 'selected':''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Emergency Contact's Phone Number:</label>
                                    <input type="text" class="form-control" name="emerg_phone"
                                           value="{{ $registration->emerg_phone }}"
                                           style="width: 100%;"/>
                                </div>
                            </div>

                            <!-- /.form-group -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Preference:</label>
                                    <input type="text" class="form-control" name="preference"
                                           value="{{ $registration->preference }}"
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Does Anyone in this room have any Special Needs or Dietary/Physical
                                        Restrictions?</label><br>
                                    <input type="radio" name="needs"
                                           {{ $registration->special_need=='yes' ? 'checked':'' }}  value="yes"/>
                                    Yes<br>
                                    <input type="radio" name="needs"
                                           {{ $registration->special_need=='no' ? 'checked':'' }}  value="no"/>
                                    No<br>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Please Specify:</label>
                                    <input type="text" name="specify_need" value="{{ $registration->specify_need }}"
                                           class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <h3>Additional Attendee's</h3>
                                <div class="form-group col-xs-12">
                                    <label>I am registering additional attendees for program dates
                                        IN MY ROOM (Additional night costs added below)
                                        hotel considers anyone over 9 years as an adult for meal and ticket
                                        purposes:</label><br>
                                </div>
                                @foreach ($additional_attendees as $ad_attendee)
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <input type="radio" name="attandees"
                                               {{ $registration->attendee_date_id == $ad_attendee->id ? 'checked':'' }}
                                               value="{{$ad_attendee->id}}"> {{$ad_attendee->attendee_date}} |
                                        <label>{{$ad_attendee->rate}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <h3>Meeting</h3>
                                <div class="form-group">
                                    <label>Meeting:</label>
                                    <input type="text" class="form-control" name="meeting"
                                           value="{{ $registration->meeting_participants }}">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <h3>Hotel</h3>
                                <div class="form-group col-xs-12 col-sm-6">

                                    <label>Would you like to extend your trip either by arriving before the program
                                        starts
                                        or
                                        staying after the program ends?</label><br>
                                    <input type="radio" name="extend_trip"
                                           {{ $registration->extend_trip == 'yes'?'checked':'' }} value="yes">
                                    Yes<br>
                                    <input type="radio" name="extend_trip"
                                           {{ $registration->extend_trip == 'no'?'checked':'' }} value="no">
                                    No<br>
                                </div>

                                <div class="form-group col-xs-12 col-sm-6">

                                    <label>I am a European Dealer:</label><br><br>
                                    <input type="radio"
                                           {{ $registration->european_dealer == 'no'?'checked':'' }} name="eur_dealer"
                                           value="no"> No<br>
                                    <input type="radio"
                                           {{ $registration->european_dealer == 'yes'?'checked':'' }} name="eur_dealer"
                                           value="yes"> Yes - European
                                    Dealers arrive October 28 and Depart Oct 31
                                </div>

                            </div>


                            <div class="form-group col-xs-12">
                                <br>
                                <label class="eu_dealer">
                                    EUROPEAN DEALERS PLEASE NOTE: Master Spas is covering your stay for an additional
                                    night:
                                    Arriving: October 28, 2017 and Departing: October 31, 2017.
                                </label>
                                <div class="col-xs-12"><br>
                                    <label>The event STARTS Sunday October 29, 2017
                                        What date would you like to ARRIVE?
                                        RATES ARE ROOM ONLY and include taxes- NO MEALS ARE INCLUDED:</label>
                                </div>
                                @foreach($arrival_dates as $arr_date)

                                    <div class="col-xs-12 col-sm-6">
                                        <input type="radio" name="arrival_date"
                                               {{ $registration->arrival_date_id == $arr_date->id ? 'checked':'' }}
                                               value="{{$arr_date->id}}"> {{$arr_date->arrival_date}} |
                                        <label>{{$arr_date->rate}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-xs-12 eu_dealer">
                                <div class="form-group col-xs-12">
                                    <label>The event ENDS Tuesday October 31, 2017
                                        If Extending, What date would you like to DEPART?
                                        RATES ARE ROOM ONLY and include taxes- NO MEALS ARE INCLUDED.:</label><br>
                                </div>
                                @foreach($departure_dates as $depart_date)
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <input type="radio" name="departure"
                                               {{ $registration->departure_date_id == $depart_date->id ? 'checked':'' }}
                                               value="{{$depart_date->id}}"> {{$depart_date->departure_date}} |
                                        <label>{{$depart_date->rate}}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-lg-12 eu_dealer">
                                <div class="form-group col-xs-12">
                                    <br>
                                    <label>I am Registering Additional Attendees for Extended Nights IN MY ROOM.
                                        Additional people under 18 years old in a room with 2 Adults are
                                        FREE.:</label><br>
                                </div>
                                @foreach($extended_nights as $ex_night)
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <input type="radio" name="extended_night"
                                               {{ $registration->attende_ext_night_id == $ex_night->id ? 'checked':'' }}
                                               value="{{$ex_night->id}}"> {{$ex_night->extended_night}} |
                                        <label>{{$ex_night->rate}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-12">
                                <h3>Flights</h3>
                                <div class="form-group col-lg-6">
                                    <label>Would You Like A Quote for Airfare?</label><br>
                                    <input type="radio" name="quote_airfare"
                                           value="yes" {{ $registration->airfare_quote == 'yes' ? 'checked':''}}>
                                    YES<br>
                                    <input type="radio" name="quote_airfare"
                                           value="NO. I am driving." {{ $registration->airfare_quote == 'NO. I am driving.' ? 'checked':''}}>
                                    NO. I am driving.<br>
                                    <input type="radio" name="quote_airfare"
                                           value="NO, I will be booking my own airfare and will email my itinerary once booked." {{ $registration->airfare_quote == 'NO, I will be booking my own airfare and will email my itinerary once booked.' ? 'checked':''}}>
                                    NO, I will be booking my own airfare and will email my itinerary once booked.<br>

                                </div>

                                <div class="form-group col-lg-6 quote">
                                    <label>Class of Service:</label><br>
                                    <input type="checkbox"
                                           {{ $registration->service_class == 'Coach' ? 'checked':''}} name="service"
                                           value="Coach">
                                    Coach<br>
                                    <input type="checkbox"
                                           {{ $registration->service_class == 'Business/First Class' ? 'checked':''}} name="service"
                                           value="Business/First Class"> Business/First Class<br>

                                </div>
                            </div>

                            <div class="col-lg-12 quote">
                                <div class="form-group col-lg-4">
                                    <label>Departure City:</label>
                                    <input type="text" name="dcity" class="form-control" id=""
                                           value="{{ $registration->dpt_city }}">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>Departure Date:</label>
                                    <input type="text" name="ddate" class="form-control" data-date-format="YYYY-MM-DD"
                                           id="datepicker" value="{{ $registration->dpt_date }}"
                                    >
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>Preferred Departure Time:</label>
                                    <input type="text" name="pdtime" class="form-control " id="datetimepicker3"
                                           value="{{ $registration->pref_dpt_time }}">
                                </div>
                            </div>

                            <div class="col-lg-12 quote">
                                <div class="form-group col-lg-4 ">
                                    <label>Return Date:</label>
                                    <input class="form-control datepicker" type="text" name="rdate" data-date-format="YYYY-MM-DD"
                                           value="{{ $registration->ret_date }}" id="datepicker1">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>Preferred Return Time:</label>
                                    <input type="text" name="prtime" class="form-control" id="datetimepicker2"
                                           value="{{ $registration->pref_ret_time }}">
                                </div>


                                <div class="form-group col-lg-4 ">
                                    <label>Preferred Airline:</label>
                                    <input type="text" name="pairline" class="form-control" id=""
                                           value="{{ $registration->pref_airline }}" placeholder="">
                                </div>

                            </div>

                            <div class="col-lg-12 quote">
                                <div class="form-group col-lg-4">
                                    <label>Frequent Flyer #:</label>
                                    <input type="text" name="fflyer" class="form-control" id=""
                                           value="{{ $registration->freq_flyer_no }}" placeholder="">
                                </div>

                                <div class="form-group col-lg-8 quote">
                                    <br>
                                    <label>Method of Payment:</label><br>
                                    <input type="radio" name="pay_method"
                                           {{ $registration->payment_method == 'An Invoice Will Be Sent If Applicable' ? 'checked':''}} value="An Invoice Will Be Sent If Applicable">
                                    An Invoice Will Be Sent If Applicable &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="pay_method"
                                           {{ $registration->payment_method == 'Credit Card' ? 'checked':''}} value="Credit Card">
                                    Credit Card<br>


                                </div>
                            </div>

                            <div class="col-lg-12 quote">

                                <div class="form-group col-xs-12">
                                    <br>
                                    <label>Special Notes:</label><br>
                                    <textarea name="snotes" class="form-control" id="special_note" value=""
                                              placeholder="">{{ $registration->special_notes }}</textarea>
                                </div>

                            </div>
                            <div class="col-xs-12">
                                <h3>Agreement</h3>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label>Special Circumstances or Notes:</label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <textarea name="specialnotes" class="form-control" id="special_cir"
                                              placeholder="">{{ $registration->special_circumstances }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary pull-right">Update</button>

                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            console.log("Hello");
            $('.datepicker').datetimepicker({
                format: 'L'

            });
        })


        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm'
            });
        });
        $(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'HH:mm'
            });
        });

        $(function () {
        });
        $(function () {
            $('#datepicker1').datetimepicker({
                format: 'L'

            });
        });
        </script>
@endsection