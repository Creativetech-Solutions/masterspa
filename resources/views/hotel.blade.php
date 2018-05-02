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
    <div class="container-fluid">
        <div class="container-page">
            <h3 class="dark-grey">Hotel</h3>
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
            <form action="{{ url('/flights') }}" class="pref-form">
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-6">
                        <br><br>
                        <label>Would you like to extend your trip either by arriving before the program starts or
                            staying after the program ends?</label><br>
                        <input type="radio" name="hotel" value="yes"> Yes<br>
                        <input type="radio" name="hotel" value="no"> No<br>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <br><br>
                        <label>I am a European Dealer:</label><br><br>
                        <input type="radio" name="hotel" value="no"> No<br>
                        <input type="radio" name="hotel"
                               value="Yes - European Dealers arrive October 28 and Depart Oct 31"> Yes - European
                        Dealers arrive October 28 and Depart Oct 31
                    </div>

                </div>

                <div class="form-group col-xs-12">
                    <br>
                    <label>
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
                            <input type="radio" name="hotel"
                                   value="{{$arr_date->id}}"> {{$arr_date->arrival_date}} |
                            <label>{{$arr_date->rate}}</label>
                        </div>
                    @endforeach

                    <div class="col-xs-12">
                        <div class="form-group col-xs-12">
                            <label>The event ENDS Tuesday October 31, 2017
                                If Extending, What date would you like to DEPART?
                                RATES ARE ROOM ONLY and include taxes- NO MEALS ARE INCLUDED.:</label><br>
                        </div>
                        @foreach($departure_dates as $depart_date)
                            <div class="form-group col-xs-12 col-sm-6">
                                <input type="radio" name="hotel"
                                       value="{{$depart_date->id}}"> {{$depart_date->departure_date}} |
                                <label>{{$depart_date->rate}}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group col-xs-12">
                            <br>
                            <label>I am Registering Additional Attendees for Extended Nights.IN MY ROOM.
                                Additional people under 18 years old in a room with 2 Adults are FREE.:</label><br>
                        </div>
                        @foreach($extended_nights as $ex_night)
                            <div class="form-group col-xs-12 col-sm-6">
                                <input type="radio" name="hotel"
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
    <script type="text/javascript">
        $(document).on('click', '.selecturl', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var result = url.substring(url.lastIndexOf("/") + 1);
            previouspage(result);
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('meeting');
        });
        function previouspage(url) {
            $('input[name="url"]').val(url);
            $('.pref-form').submit();
        }


    </script>
@endsection
