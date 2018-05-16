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


                        <h1 class="page-title">Guests</h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

@endsection
@section('content')
    @php

        $attendes[0]= new \stdClass();
        $attendes[0]->id = "";
        $attendes[0]->fname = "";
        $attendes[0]->badge_fname = "";
        $attendes[0]->middle_fname = "";
        $attendes[0]->lname = "";
        $attendes[0]->tshirt_size = "";

    if(!empty($registration->id) and $registration->num_of_travlers > 0){
        $attendees = $registration->attendees;
        if(count($attendees)>0){
            $attendes = $attendees;
        }

    } else {

        $registration->num_of_travlers = 1;
    }

    @endphp
    <div class="container-fluid">
        <div class="container-page">

            @include('layouts/notify')
            <h3 class="dark-grey">Guest Details</h3>
            <div class="col-xs-12">
                <label>
                    <h4>Please enter names of all guests attending below.
                        Please use names exactly as they appear on the documents you are using for identification.
                        Please type carefully using correct capitalization and
                        <spelling class=""></spelling>
                        Your trip documents will be created from your input.
                    </h4>
                </label>
                <br>
            </div>
            <form action="{{ url('/additional') }}" method="POST" class="pref-form">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="form-group col-xs-12">
                        <div class="col-xs-6 col-sm-4">
                            <label>How Many Travelers in this Room?</label>
                        </div>
                        <div class="col-xs-6">
                            @for($i = 1; $i <= 4; $i++)
                                <input type="radio" value="{{ $i }}"
                                       name="num_of_travler" {{ $registration->num_of_travlers == $i ? 'checked':'' }}> {{$i}}
                                &nbsp;&nbsp;&nbsp;
                            @endfor
                        </div>
                    </div>
                    <div class="main-attendi-wrapper">
                        @foreach($attendes as $key => $val)
                            <div id="attendi_{{$key+1}}" class="col-xs-12 attendi-wraper">
                                <div class="col-xs-12 heading"><h4>Attendee <span class="attendi-num">{{$key+1}}</span>
                                    </h4></div>
                                <input type="hidden" name="attendie_ids[]" class="attendie_id" value="{{ $val->id }}">
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-4">
                                        <label>First Name AS ON ID:</label>
                                        <input type="text" name="gfname[]" required class="form-control"
                                               placeholder="Guest First Name" value="{{ $val->fname }}">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>First Name Preferred on Name Badge:</label>
                                        <input type="text" name="gbadgefname[]" class="form-control" required
                                               placeholder="Badge First Name" value="{{ $val->badge_fname }}">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>Middle Name AS ON ID:</label>
                                        <input type="text" name="gmiddle_name[]" class="form-control" required
                                               placeholder="Middle Name" value="{{ $val->middle_fname }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-4">
                                        <label>Last Name AS ON ID:</label>
                                        <input type="text" name="glname[]" required class="form-control"
                                               placeholder="Last Name" value="{{ $val->lname }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Age:</label>
                                        <input type="number" name="age[]" min="0" required class="form-control"
                                                   placeholder="Age" value="{{ $val->age }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>T-shirt size:</label>
                                        <select name="gshirtsize[]" class="form-control" required
                                                placeholder="Select Shirt Size" >
                                            <option disabled selected></option>
                                            <option value="S" {{ $val->tshirt_size == "S" ? 'selected':''}} > S </option>
                                            <option value="M" {{ $val->tshirt_size == 'M'? 'selected': ''}}>M</option>
                                            <option value="L" {{ $val->tshirt_size == 'L' ? 'selected': ''}}>L</option>
                                            <option value="XL" {{ $val->tshirt_size == 'XL' ? 'selected': ''}}>XL</option>
                                            <option value="2XL" {{ $val->tshirt_size == '2XL' ? 'selected': ''}}>2XL</option>
                                            <option value="3XL" {{ $val->tshirt_size == '3XL'? 'selected': ''}}>3XL</option>
                                        </select>
                                        <input type="hidden" name="url" value=""/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        $(document).on('click', 'input[name="num_of_travler"]', function () {
            $('.attendi-one').show();
            var val = $(this).val();
            var currAttendi = $('.attendi-wraper').length;
            console.log('Val :' + val);
            console.log('currAttendi : ' + currAttendi);
            if (currAttendi > val) {
                for (var i = currAttendi - 1; i >= val; i--) {
                    $('.attendi-wraper')[i].remove();
                }
            } else {
                for (var i = currAttendi; i < val; i++) {
                    var attendi = $('#attendi_1').clone().prop('id', 'attendi_' + (i + 1));
                    $('.main-attendi-wrapper').append(attendi);
                    $('#attendi_' + (i + 1)).find('.attendi-num').html(i + 1);
                    $('#attendi_' + (i + 1)).find('.attendie_id').val("");
                }
            }
        });

        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('prefrences');
        });

    </script>
@endsection