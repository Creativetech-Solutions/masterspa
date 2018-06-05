@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images//WebPhotoHeader_07.jpg') }});
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


                        <h1 class="page-title">Prefrences</h1>


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
            $registration->preference = "";
            $registration->special_need = "";
            $registration->specify_need = "";
            $registration->unique_id ="";
            $registration->hotel_check_in ="";
            $registration->hotel_check_out ="";
        }

            
        if($registration->hotel_check_in == '1970-01-01' || $registration->hotel_check_in == '0000-00-00')
            $registration->hotel_check_in = "";
            
        if($registration->hotel_check_out == '1970-01-01' || $registration->hotel_check_out == '0000-00-00')
            $registration->hotel_check_out = "";
    @endphp
    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            
                <h3 class="dark-grey">Preferences</h3>
            <div class="col-xs-12">
                <label><h4>Bed types are based on availability, and are not guaranteed.
                        All rooms are non-smoking, there are designated outside areas for smoking.</h4>
                    <br></label>
            </div>
            <form action="{{ url('/guests') }}" class="pref-form" method="POST">
                {{ csrf_field() }}
                <div class="col-lg-12">


                    <div class="form-group col-lg-4">
                        <label>Prefrences:</label><br>
                        <input type="radio" name="preference"
                               {{ $registration->preference == 'king' ? 'checked':'' }} value="king"/> King<br>
                        <input type="radio" name="preference"
                               {{ $registration->preference=='beds' ? 'checked':'' }} value="beds"/> 2 Beds<br>
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Does Anyone in this room have any Special Needs or Dietary/Physical Restrictions?</label><br>
                        <input type="radio" name="needs"
                               {{ $registration->special_need=='yes' ? 'checked':'' }}  value="yes"/> Yes<br>
                        <input type="radio" name="needs"
                               {{ $registration->special_need=='no' ? 'checked':'' }}  value="no"/> No<br>
                        <input type="hidden" name="url" value=""/>
                    </div>
                    <div id="s_need" class="col-lg-4" style="display: {{$registration->special_need == 'yes' ?'block':'none'}}">
                        <label>Please Specify:</label>
                        <input type="text" name="specify_need" value="{{$registration->specify_need}}"
                               class="form-control" placeholder="Specify here">
                    </div>

                </div>


                <div class="form-group col-xs-12">
                    <br>
                    <label>
                        <h4 class="dark-grey">Room Reservation Dates</h4>
                    </label><br>

                    If you would like to extend your stay at Sheraton Grand at WildHorse Pass, please indicate your dates below. Master Spas has special rates 3 days before and 3 days after the program, however rooms are based on availability. Rates include all taxes and fees. Meals are not included on extended nights. For pre and post rooms all children under the age of 12 years are free in the room with 2 adults. Please do not book any flights for additional nights prior to receiving confirmation that the room is available. Please Note any extension pre or post your program dates for guests 12 years old and over, will incur the following charges: SINGLE/DOUBLE Occupancy $265 Per Room Per Night. TRIPLE Occupancy $300 Per Room Per Night. QUAD Occupancy $335 Per Room Per Night.

                </div>
                <div class="form-group col-lg-12">
                    <div class="form-group col-lg-4">
                        <label>Hotel Check-In Date:</label>
                        <input type="text" name="hotel_check_in" class="form-control datepicker" data-date-format="YYYY-MM-DD"
                                value="{{ $registration->hotel_check_in }}"
                        >
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Hotel Check-Out Date:</label>
                        <input type="text" name="hotel_check_out" class="form-control datepicker" data-date-format="YYYY-MM-DD"
                               value="{{ $registration->hotel_check_out }}"
                        >
                    </div>
                </div>
                <div class="col-md-8">
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
        $('input[name="needs"]').click(function () {
            var val = $(this).val();
            if (val == 'yes') {
                $('#s_need').show();
            } else {
                $('#s_need').hide();
            }
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('/');
        });
         $(function () {
            $('.datepicker').datetimepicker({
                format: 'L'

            });
        });
    </script>
@endsection
