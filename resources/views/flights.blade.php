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


                        <h1 class="page-title">Flights</h1>


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
            $registration->airfare_quote = "";
            $registration->service_class = "";
            $registration->dpt_city = "";
            $registration->dpt_date = "";
            $registration->pref_dpt_time = "";
            $registration->ret_date = "";
            $registration->pref_ret_time = "";
            $registration->pref_airline = "";
            $registration->freq_flyer_no = "";
            $registration->payment_method = "";
            $registration->special_notes = "";
        }
    @endphp


    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            <h3 class="dark-grey">Flights</h3>
            <div class="col-xs-12">
                <label><h4>
                        Flight costs are the responsibility of the attendee.
                        If you would like a quote for airfare, please fill out the information below.
                        If you book your own flights, please forward a copy of your entire itinerary to
                        <a>masterspas@latitudeevents.com</a> so we can arrange for your complimentary transportation
                        between the Phoenix airport and the hotel on arrival and departure.
                        Please note that Master Spas will only provide complimentary transportation on the official
                        arrival date(s) Nov 1 International and Nov 2 North American, and Departure of Nov 5.
                        If you would like to extend your trip, please let us know PRIOR to booking any flights, so we
                        can confirm availability at the hotel. <br>
                    </h4>
                </label>
            </div>
            <form action="{{ url('/agreement') }}" method="POST" class="pref-form">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <label>Would You Like A Quote for Airfare?</label><br>
                        <input type="radio" name="quote_airfare"
                               value="yes" {{ $registration->airfare_quote == 'yes' ? 'checked':''}}> YES<br>
                        <input type="radio" name="quote_airfare"
                               value="NO. I am driving." {{ $registration->airfare_quote == 'NO. I am driving.' ? 'checked':''}}>
                        NO. I am driving.<br>
                        <input type="radio" name="quote_airfare"
                               value="NO, I will be booking my own airfare and will email my itinerary once booked." {{ $registration->airfare_quote == 'NO, I will be booking my own airfare and will email my itinerary once booked.' ? 'checked':''}}>
                        NO, I will be booking my own airfare and will email my itinerary once booked.<br>

                    </div>

                    <div class="form-group col-lg-6 quote"
                         style="display: {{$registration->airfare_quote == 'yes' ?'block':'none'}}">
                        <label>Class of Service:</label><br>
                        <input type="checkbox"
                               {{ $registration->service_class == 'Coach' ? 'checked':''}} name="service" value="Coach">
                        Coach<br>
                        <input type="checkbox"
                               {{ $registration->service_class == 'Business/First Class' ? 'checked':''}} name="service"
                               value="Business/First Class"> Business/First Class<br>

                    </div>
                </div>

                <div class="col-lg-12 quote" style="display: {{$registration->airfare_quote == 'yes' ?'block':'none'}}">
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


                <div class="col-lg-12 quote" style="display: {{$registration->airfare_quote == 'yes' ?'block':'none'}}">
                    <div class="form-group col-lg-4 ">
                        <label>Return Date:</label>
                        <input class="form-control" type="text" name="rdate" data-date-format="YYYY-MM-DD"
                               value="{{ $registration->ret_date }}" id="datepicker1"
                               placeholder="">
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

                <div class="col-lg-12 quote" style="display: {{$registration->airfare_quote == 'yes' ?'block':'none'}}">
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

                <div class="col-lg-12 quote" style="display: {{$registration->airfare_quote == 'yes' ?'block':'none'}}">

                    <div class="form-group col-xs-12">
                        <br>
                        <label>Special Notes:</label><br>
                        <textarea name="snotes" class="form-control" id="" value=""
                                  placeholder="">{{ $registration->special_notes }}</textarea>
                    </div>

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
            $('#datepicker').datetimepicker({
                format: 'L'

            });
        });
        $(function () {
            $('#datepicker1').datetimepicker({
                format: 'L'

            });
        });
        $('input[name="quote_airfare"]').click(function () {
            var val = $(this).val();
            if (val == 'yes') {
                $('.quote').show();
            } else {
                $('.quote').hide();
            }
        });

        /*$(function () {
         $('input[name="ddate"]').daterangepicker({
         singleDatePicker: true
         });
         });*/
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('hotel');
        });

    </script>
@endsection