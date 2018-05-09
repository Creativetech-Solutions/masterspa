@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header{background-image:url({{ asset('public/images//WebPhotoHeader_01-1.jpg') }});}
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


                        <h1 class="page-title">Prefrences</h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

@endsection


@section('content')
@php
    if($requriedFieldMissing == 'true'){
        $requiredFields = [
            'Personal Information' => [
                'comp_name'=>'Company Name',
                'fname'=>'First Name',
                'lname' =>'Last Name',
                'tel'=>'Telephone Number',
                'cell'=>'Cell Number',
                'email'=>'Email',
                'address'=>'Address',
                'city'=>'City',
                'state'=>'State',
                'zip'=>'Zip',
                'country'=>'Country',
                'emerg_contact'=>'Emergency Contact',
                'emerg_phone'=>'Emergency Phone',
                ],
            'Preferences' => [
                'preference'=>'Preference',
                'special_need'=>'Special Need',
            ],
            'Meeting'=>[
                'meeting_participants'=>'Meeting Participants',
            ],
            'Flights'=>[
                'airfare_quote'=>'Airfare Quote',
            ]
        ];
        if($registration->airfare_quote == "yes"){
            $requiredFields['Flights'] = [
                'airfare_quote'=>'Airfare Quote',
                'service_class'=>'Service Class',
                'dpt_city'=>'Depart City',
                'dpt_date'=>'Depart Date',
                'pref_dpt_time'=>'Preferred Departure Time',
                'ret_date'=>'Return Date',
                'pref_ret_time'=>'Preferred Return Time',
                'pref_airline'=>'Preferred Airline',
                'freq_flyer_no'=>'Frequent Flyer No',
                'payment_method'=>'Payment Method',
                'special_notes'=>'Special Notes'
            ];
        }

    } 


@endphp
    <div class="container-fluid">
        <div class="container-page" style="padding-bottom:230px;">
        @if($requriedFieldMissing == 'true')
        <div class="alert alert-warning">
          <strong>Please return to complete the following required fields </strong>
        </div>
        <div class="col-xs-12">
        @foreach($requiredFields as $k => $sect)
            @php $count = 0; @endphp
            @foreach($sect as $key => $field)
                @if(empty($registration->$key))

                    @if($count == 0)
                        <strong>{{ $k }}</strong><br>
                        @php $count += 1 @endphp
                    @endif

                    {{$field }} <br>
                @endif
            @endforeach
        @endforeach
         <br>
        <a class="btn btn-primary" href="{{ url('/') }}" style="color:white">Back</a>
        </div>
        @else
        <div class="alert alert-success">
          <strong>Thank you for submitting your registration. </p>
        </div>

        <a class="btn btn-primary" href="{{ url('/') }}" style="color:white">Review Registration</a>
        @endif
        </div>
    </div>
@endsection

