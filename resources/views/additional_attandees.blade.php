@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images/WebPhotoHeader_02.jpg') }});
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


                        <h1 class="page-title">Additional Attendees</h1>


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
            $registration->attendee_date_id = "";
        }

    @endphp
    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            <div class="col-sm pull-right">
                <label>Your Unique ID:</label>
                <input type="text" value="{{$registration->unique_id}}" readonly disabled>
            </div>
            <div style="background-color: lightgrey; padding: 8px" class="pull-left">
                <p style="color: red; margin: 0px"><b>Please note and save your unique ID, in order to return and see your information.</b></p>
            </div>
            <h3 class="dark-grey">Additional Attendees</h3>
            <div class="col-xs-12">
                <label><h4>Master Spas is covering the cost for 2 persons per room.
                        You may bring additional people at the below charge.
                        Cost includes 3 nights hotel, (4 Nights for European Dealers),
                        Participation in, and meals at Master Spas Events,
                        round trip airport transfers between Phoenix International and Sheraton Grand at WildHorse Pass.
                        </h4></label>
                <br>
            </div>
            <form action="{{ url('/meeting') }}" method="post" class="pref-form">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="form-group col-xs-12">
                        <label>I am registering additional attendees for program dates
                            IN MY ROOM (Additional night costs added below)
                            hotel considers anyone over 9 years as an adult for meal and ticket purposes:</label><br>
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
                <input type="hidden" name="url" value=""/>

                <div class="col-xs-12">

                    <p><a style="cursor:pointer" class="link">Click here to clear selection for question above</a></p>


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
        $(document).on('click','.link', function(e){
            $('input[name="attandees"]').prop('checked',false);
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('guests');
        });
    </script>
@endsection