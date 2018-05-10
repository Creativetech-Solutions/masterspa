@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images/WebPhotoHeader_04.jpg') }});
        }
    </style>
    <div class="site-header-wrapper">


        <div class="site-title-wrapper">


            <h1 class="site-title"><a href="http://groupregistration.net/" rel="home">Group Registration</a></h1>
            <div class="site-description">Travel With Us</div>
        </div><!-- .site-title-wrapper -->

        <div class="hero">


            <div class="hero-inner">


                <div class="page-title-container">

                    <header class="page-header">


                        <h1 class="page-title">Hotel</h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

@endsection
@section('content')
    @php

        if(empty($registration->id)){
            $registration = new \stdClass();
            $registration->arrival_date_id = "";
            $registration->departure_date_id = "";
            $registration->attende_ext_night_id = "";
            $registration->extend_trip = "";
            $registration->european_dealer = "";
        }

    @endphp
    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            <h3 class="dark-grey">Hotel</h3>
            <div class="col-xs-12">
                <label><h4>
                        If you would like to extend your Sheraton Grand at WildHorse Pass - please fill out the below
                        information.
                        We will confirm availability for you.
                        Master Spas has special rates 3 days before and 3 days after the program, however rooms are
                        based on availability. Rates include all taxes and fees including resort fee. Meals are not
                        included on extended nights.
                        For pre and post rooms all children under the age of 18 years are free in the room with 2
                        adults.<br>
                        Please do not book any flights for additional nights prior to receiving confirmation that the
                        room is available.</h4></label>
                <br>
            </div>
            <form action="{{ url('/flights') }}" class="pref-form" method="post">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-6">
                        <br><br>
                        <label>Would you like to extend your trip either by arriving before the program starts or
                            staying after the program ends?</label><br>
                        <input type="radio" name="extend_trip" {{ $registration->extend_trip == 'yes'?'checked':'' }} value="yes"> Yes<br>
                        <input type="radio" name="extend_trip" {{ $registration->extend_trip == 'no'?'checked':'' }} value="no"> No<br>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <br><br>
                        <label>I am a European Dealer:</label><br><br>
                        <input type="radio" {{ $registration->european_dealer == 'no'?'checked':'' }} name="eur_dealer" value="no"> No<br>
                        <input type="radio" {{ $registration->european_dealer == 'yes'?'checked':'' }} name="eur_dealer"
                               value="yes"> Yes - European
                        Dealers arrive October 2nd and Depart Oct 31
                    </div>

                </div>

                <div class="form-group col-xs-12">
                    <br>
                    <label style="color: red" class="eu_dealer" hidden>
                        EUROPEAN DEALERS PLEASE NOTE: Master Spas is covering your stay for an additional night:
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
                            Additional people under 18 years old in a room with 2 Adults are FREE.:</label><br>
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

                <div class="col-md-6">
                    <input type="hidden" name="url" value=""/>
                    <button class="btn btn-danger previous">&laquo; Previous</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        $('.eu_dealer').hide();
        $('input[name="eur_dealer"]').click(function(){
            var val = $(this).val();
            if (val == 'yes'){
                $('.eu_dealer').show();
            }else{
                $('.eu_dealer').hide();
            }
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('meeting');
        });
    </script>
@endsection
