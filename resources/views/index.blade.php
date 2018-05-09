@extends('layouts.app')

@section('header')
    <style type="text/css">
        .site-header {
            background-image: url({{ asset('public/images/WebPhotoHeader_07.jpg') }});
        }


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
        /*echo session()->get('register_id');*/
            if(empty($registration->id)){
                    $registration = new \stdClass();
                    $registration->comp_name = "";
                    $registration->fname = "";
                    $registration->lname = "";
                    $registration->tel = "";
                    $registration->cell = "";
                    $registration->email = "";
                    $registration->email_alt = "";
                    $registration->address = "";
                    $registration->city = "";
                    $registration->state = "";
                    $registration->zip = "";
                    $registration->country = "";
                    $registration->emerg_contact = "";
                    $registration->emerg_phone = "";
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
                        <input type="text" name="cname" class="form-control" value="{{ $registration->comp_name }}"
                               placeholder="Company Name" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Contact First Name:</label>
                        <input type="text" name="cfname" class="form-control" required id=""
                               value="{{ $registration->fname }}" placeholder="First Name">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Contact Last Name:</label>
                        <input type="text" name="clname" class="form-control" required id=""
                               value="{{ $registration->lname }}" placeholder="Last Name">
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group col-lg-4 ">
                        <label>Telephone:</label>
                        <br class="col-xs-12"></br>
                        <input class="form-control" required type="text" name="tphone" value="{{ $registration->tel }}"
                               placeholder="Telephone">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Cell Phone for Reaching Attendee When Traveling:</label>
                        <input type="text" name="cellphone" class="form-control" value="{{ $registration->cell }}" placeholder="Cell Phone"  id="Cell Phone">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Email Address</label>
                        <br class="col-xs-12"></br>
                        <input type="email" required name="email" class="form-control"
                               value="{{ $registration->email }}" placeholder="Email Address">
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <div class="col-xs-12"><br></div>
                        <label>Retype Email Address</label>
                        <div class="col-xs-12"><br></div>
                        <input type="email" name="re_email" required class="form-control"
                               value="{{ $registration->email }}" placeholder="Retype Email Address">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Please enter a second Email if you would like your guest or someone else to receive the
                            trip information: </label>
                        <input type="email" name="email_alt" class="form-control" value="{{ $registration->email_alt }}"
                               placeholder="second Email">
                    </div>

                    <div class="form-group col-lg-4">
                        <div class="col-xs-12"><br></div>
                        <label>Please retype your second email address:</label>
                        <div class="col-xs-12"><br></div>
                        <input type="email" name="re_email_alt" class="form-control" id=""
                               value="{{ $registration->email_alt }}" placeholder="Retype second email">
                    </div>

                </div>


                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Address:</label>
                        <input type="text" name="address" required class="form-control" id=""
                               value="{{ $registration->address }}" placeholder="Address">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>City:</label>
                        <input type="text" name="city" required class="form-control" id=""
                               value="{{ $registration->city }}" placeholder="City">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>State/Province/Region:</label>
                        <input type="text" name="region" required class="form-control" id=""
                               value="{{ $registration->state }}" placeholder="State/Province/Region">
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Zip/Postal Code:</label>
                        <div class="col-xs-12"><br></div>
                        <input class="form-control" type="text" required name="pcode" value="{{ $registration->zip }}"
                               id="pcode" placeholder="Zip Code">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Country:</label>
                        <div class="col-xs-12"><br></div>
                        <select name="country" class="form-control">
                            <option value="0">Select Country</option>
                            {{print_r($countries)}}
                            @foreach($countries as $key => $country)

                                <option
                                        value="{{$country->id}}"{{ $registration->country ==  $country->id ? 'selected':''}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Emergency Contact ( Someone NOT Traveling with you ):</label>
                        <input type="text" name="emerg_contact" required class="form-control"
                               placeholder="Emergency contact" id="emerg_contact"
                               value="{{ $registration->emerg_contact }}">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Emergency Contact's Phone Number:</label>
                        <input type="text" name="emerg_phone" required class="form-control"
                               value="{{ $registration->emerg_phone }}" placeholder="phone number">
                    </div>
                </div>

                <div class="col-xs-12 text-center">

                    <input type="hidden" name="url"/>
                    <button type="submit" class="btn btn-primary btn-lg">Next</button>
                </div>
            </form>
        </div>

    </div>
@endsection



@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        function previouspage(url) {
            $('input[name="url"]').val(url);
            $('.pref-form').submit();
        }

    </script>
@endsection
