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
            <h3 class="dark-grey">Flights</h3>
            <div class="col-xs-12">
                <label><h4>
                        If you would like to extend your trip AT THE SWAN Resort - please fill out the below
                        information.
                        We will confirm availability for you.
                        Master Spas has special rates 3 days before and 3 days after the program, however rooms are
                        based on availability. Rates include all taxes and fees including resort fee. Meals are NOT
                        included on extended nights
                        For Pre and Post Rooms - all Children under the age of 18 years are Free in the room with 2
                        Adults.
                        Please DO NOT book any flights for additional nights prior to receiving confirmation that the
                        room is available.</h4></label>
                <br>
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

                    <div class="form-group col-lg-6">
                        <label>Class of Service:</label><br>
                        <input type="checkbox"
                               {{ $registration->service_class == 'Coach' ? 'checked':''}} name="service" value="Coach">
                        Coach<br>
                        <input type="checkbox"
                               {{ $registration->service_class == 'Business/First Class' ? 'checked':''}} name="service"
                               value="Business/First Class"> Business/First Class<br>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Departure City:</label>
                        <input type="text" name="dcity" class="form-control" id=""
                               value="{{ $registration->dpt_city }}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Departure Date:</label>
                        <input type="text" name="ddate" class="form-control" value="{{ $registration->dpt_date }}"
                               placeholder="">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Preferred Departure Time:</label>
                        <input type="time" name="pdtime" class="form-control" id=""
                               value="{{ $registration->pref_dpt_time }}" placeholder="">
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group col-lg-4 ">
                        <label>Return Date:</label>
                        <input class="form-control" type="text" name="ddate" value="{{ $registration->ret_date }}" id=""
                               placeholder="">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Preferred Return Time:</label>
                        <input type="time" name="prtime" class="form-control" id=""
                               value="{{ $registration->pref_ret_time }}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Preferred Airline:</label>
                        <input type="text" name="pairline" class="form-control" id=""
                               value="{{ $registration->pref_airline }}" placeholder="">
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Frequent Flyer #:</label>
                        <input type="text" name="fflyer" class="form-control" id=""
                               value="{{ $registration->freq_flyer_no }}" placeholder="">
                    </div>

                    <div class="form-group col-lg-8">
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

                <div class="col-lg-12">

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
            $('input[name="ddate"]').daterangepicker({
                singleDatePicker: true
            });
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('hotel');
        });

    </script>
@endsection