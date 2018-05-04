@extends('layouts.app')

@section('header')
<style type="text/css">
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_07.jpg') }});}


</style>
<div class="site-header-wrapper">

                
<div class="site-title-wrapper">

    
    <h1 class="site-title"><a href="{{ url('/') }}" rel="home">Group Registration</a></h1>
    <div class="site-description">Travel With Us</div>
</div><!-- .site-title-wrapper -->

<div class="hero">

    
    <div class="hero-inner">

        
<div class="page-title-container">

    <header class="page-header">

        
        <h1 class="page-title">Personal Details</h1>

        
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
            $registration->comp_name = "Company name";
            $registration->fname = "Cont First name";
            $registration->lname = "Cont last name";
            $registration->tel = "00001111";
            $registration->cell = "2222333333";
            $registration->email = "testemail@test.com";
            $registration->email_alt = "testemail_alt@test.com";
            $registration->address = "address";
            $registration->city = "US";
            $registration->state = "US";
            $registration->zip = "5555";
            $registration->country = "US";
            $registration->emerg_contact = "Test";
            $registration->emerg_phone = "232323322";
    }
@endphp

<div class="container-fluid">
        
        <div class="container-page">  
            @include('layouts/notify')
            <h3 class="dark-grey">Personal Details</h3>
                
            <form class="pref-form" action="{{ url('/prefrences') }}" method="POST">
                {{ csrf_field() }}          
                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Company Name:</label>
                        <input type="text" name="cname" required class="form-control"  value="{{ $registration->comp_name }}">
                    </div>
                    
                    <div class="form-group col-lg-4">
                        <label>Contact First Name:</label>
                        <input type="text" name="cfname" class="form-control" required id="" value="{{ $registration->fname }}" placeholder="Micheal">
                    </div>
                    
                    <div class="form-group col-lg-4">
                        <label>Contact Last Name:</label>
                        <input type="text" name="clname" class="form-control" required id="" value="{{ $registration->lname }}" placeholder="Osborne">
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group col-lg-4 ">
                     <label>Telephone:</label>
                     <br class="col-xs-12"></br>
                     <input class="form-control" required type="text" name="tphone" value="{{ $registration->tel }}" placeholder="(555)-555-5555" >
                     </div>
                                    
                    <div class="form-group col-lg-4">
                        <label>Cell Phone for Reaching Attendee When Traveling:</label>
                        <input type="text" name="cellphone" class="form-control" value="{{ $registration->cell }}">
                    </div>
                    
                    <div class="form-group col-lg-4">
                        <label>Email Address</label>
                        <br class="col-xs-12"></br>
                        <input type="email" required name="email" class="form-control" value="{{ $registration->email }}" placeholder="Michael@theislandservices.com">
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <div class="col-xs-12"><br></div>
                        <label>Retype Email Address</label>
                        <div class="col-xs-12"><br></div>
                        <input type="email" name="re_email" required class="form-control" value="{{ $registration->email }}" placeholder="Michael@theislandservices.com">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Please enter a second Email if you would like your guest or someone else to receive the trip information: </label>
                        <input type="email" name="email_alt" class="form-control" value="{{ $registration->email_alt }}">
                    </div>          
                    
                    <div class="form-group col-lg-4">
                        <div class="col-xs-12"><br></div>
                        <label>Please retype your second email address:</label>
                        <div class="col-xs-12"><br></div>
                        <input type="email" name="re_email_alt" class="form-control" id="" value="{{ $registration->email_alt }}">
                    </div>

                </div> 


                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Address:</label>
                        <input type="text" name="address" required class="form-control" id="" value="{{ $registration->address }}" placeholder="8911 Collins Ave">
                    </div>
                                    
                    <div class="form-group col-lg-4">
                        <label>City:</label>
                        <input type="text" name="city" required class="form-control" id="" value="{{ $registration->city }}" placeholder="Surfside">
                    </div>
                    
                    <div class="form-group col-lg-4">
                        <label>State/Province/Region:</label>
                        <input type="text" name="region" required class="form-control" id="" value="{{ $registration->state }}" placeholder="FL">
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                     <label>Zip/Postal Code:</label>
                        <div class="col-xs-12"><br></div>
                     <input class="form-control" type="text" required name="pcode" value="{{ $registration->zip }}" id="pcode" placeholder="55555-5555" >
                     </div>

                     <div class="form-group col-lg-4">
                        <label>Country:</label>
                        <div class="col-xs-12"><br></div>
                        <select name="country" class="form-control" >
                            <option value="0">Select Country</option>
                            @foreach($countries as $key => $country) 
                                <option 
                                {{ $registration->country ==  $country->id ? 'selected':''}}
                                value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Emergency Contact ( Someone NOT Traveling with you ):</label>
                        <input type="text" name="emerg_contact" required class="form-control" id="emerg_contact" value="{{ $registration->emerg_contact }}">
                    </div>
                </div>

                <div class="col-lg-12">
                     <div class="form-group col-lg-4">
                        <label>Emergency Contact's Phone Number:</label>
                        <input type="text" name="emerg_phone" required class="form-control" value="{{ $registration->emerg_phone }}">
                    </div>
                </div>

                <div class="col-xs-12 text-center">
                    
                    <input type="hidden" name="url" />
                    <button type="submit" class="btn btn-primary btn-lg">Next</button>
                </div>
            </form>
        </div>
    
</div>
@endsection



@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        function previouspage(url){
            $('input[name="url"]').val(url);
            $('.pref-form').submit();
        }

    </script>
@endsection
