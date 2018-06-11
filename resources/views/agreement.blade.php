@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>

        .site-header {
            background-image: url({{ asset('public/images/WebPhotoHeader_01-1.jpg') }});
        }

        .req-attr {
            border: 1px solid red;
            border-radius: 4px;
        }

        .card-imgs {
            background-repeat: no-repeat;
            background-position: 15px 0px;
            position: relative;
            height: 30px;
            width: 100%;
            display: block;
            margin-bottom: 8px;
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


                        <h1 class="page-title">Payment</h1>


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
            $registration->save_info = "";
            $registration->need_invoice = "";
            $registration->send_invoice = "";
            $registration->special_circumstances = "";
        }
    @endphp
    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            <h3 class="dark-grey">Payment</h3>
            <div class="col-xs-12">
                <label><h4><strong>Cancellations:</strong> Cancellations must be received in writing and are subject to
                        the following charges: Cancellations before Aug 29 - no fee (except airline tickets if already
                        booked). Cancellations received from Aug 30 - Sept 30: 2 nights per person charge; Cancellations
                        received after October 1: 100% charge.</h4></label>
                <br>
            </div>
            <form action="{{ url('/submission') }}" method="POST" class="pref-form">
                {{ csrf_field() }}
                <div class="col-xs-12">
                    <div class="form-group row col-xs-12">
                        <label>If Applicable, An Invoice Will Be Sent Based On Your Above Selections and Their
                            Availability, Once Confirmed:</label>
                    </div>
                </div>

                <div class="col-xs-12 row">

                    <div class="col-xs-12">
                        <label>Prices Detail:</label>
                    </div>
                    <div class="form-group col-xs-12">
                        <div class="col-md-3"><b>Hotel Check In : </b></div>
                        <div class="col-md-9">{{ $registration->hotel_check_in}}</div>
                        <div class="col-md-3">Hotel Check Out :</div>
                        <div class="col-md-9">{{ $registration->hotel_check_out}}</div>
                        <br>
                        <div class="col-md-3">Total Hotel Nights :</div>
                        <div class="col-md-9">{{ $price_info['total_num_of_days']}}</div>
                        <br>
                        <div class="col-md-3">Included Hotel Nights :</div>
                        <div class="col-md-9">{{ $price_info['total_num_of_days'] - $price_info['num_of_days']}}</div>
                        <br>
                        <div class="col-md-3">Your Additional Nights :</div>
                        <div class="col-md-9">{{ $price_info['num_of_days']}}
                            @if($price_info['adult'] == 2)
                                @ $265.00 per night
                            @elseif($price_info['adult'] == 3)
                                @ $300.00 per night
                            @elseif($price_info['adult'] == 4)
                                @ $335.00 per night
                            @endif
                        </div>
                        <br>
                        <div class="col-md-3">Total Attendees :</div>
                        <div class="col-md-9">{{ $registration->num_of_travlers }}</div>
                        <br>
                        <div class="col-md-3">Adults :</div>
                        <div class="col-md-9">{{ $price_info['adult']}}</div>
                        <br>
                    <!-- <div class="col-md-3">Above 5 Years : </div>
                   <div class="col-md-9">{{ $price_info['above_five']}}</div> -->
                        <div class="col-md-3">Below 5 Years :</div>
                        <div class="col-md-9">{{ $price_info['below_five']}} @ $350.00 per child</div>
                        <br>
                        <div class="col-xs-12">
                            <hr/>
                        </div>
                        <div class="col-md-3"><strong>Total Price</strong></div>
                        <br>
                        <div class="col-md-2"><strong><input value="{{ $price_info['prices']}}" class="form-control"
                                                             readonly/></strong></div>
                    </div>
                </div>
                @if($registration->status != 'Registered')
                    <div class="col-xs-12">
                        <span class="card-imgs"
                              style="background-image: url({{ asset('public/images/creditcards.svg') }})"></span>
                    </div>
                <input type="hidden" name="total" value="{{ $price_info['prices']}}">
                    <div class="col-xs-12">
                        <div class="form-group col-xs-12 col-sm-5">
                            <label>Name</label>
                            <input type="text" name="first_name" class="form-control"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-5">
                            <label>Credit Card Number</label>
                            <input type="text" name="cc_num" class="form-control"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-5">
                            <label>CVV2</label>
                            <input type="text" name="ccv" class="form-control"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-2">
                            <label>Month</label>
                            <select name="cc_mon" class="form-control">
                                <option></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-2">
                            <label>Year</label>
                            <select name="cc_yr" class="form-control">
                                <option></option>
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                            </select>
                        </div>
                    </div>
                @endif
                <div class="col-xs-12">

                    <div class="form-group col-xs-12 col-sm-6">
                        <label>Special Circumstances or Notes:</label>
                    </div>
                    <div class="form-group col-xs-12">
                        <textarea name="specialnotes" class="form-control" id=""
                                  placeholder="">{{ $registration->special_circumstances }}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group col-xs-6">
                        <label>Save Information:</label><br>
                        <input type="checkbox" name="save_info"
                               {{ $registration->save_info == 1 ? 'checked':'' }} value="1"> Checking this option will
                        save your information for future registrations<br>
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Need Invoice:</label><br>
                        <input type="checkbox" name="need_invoice"
                               {{ $registration->need_invoice == 1 ? 'checked':'' }} value="1"> Please click here if you
                        need an invoice generated prior to payment<br>

                    </div>
                    <div class="form-group col-xs-12">
                        <input type="radio" name="agreement"
                               {{ $registration->send_invoice == 1 ? 'checked':'' }} value="1"> I agree to Pay The
                        Charges Based on My Selections Once Available and Approved.<br>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="url" value=""/>
                    <button class="btn btn-danger previous">&laquo; Previous</button>
                    @if($registration->status != 'Registered')
                        <button type="submit" class="btn btn-primary sub">Submit Registration</button>
                        <a href="{{url('/submission')}}" class="btn btn-default snc">Save and Complete Later</a><br>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- popup to ask for agreement -->
    <div class="modal agree-fr-pay" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Please agree to pay any applicable charges</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        $(document).on('click', '.sub', function (e) {
            e.preventDefault();
            if ($('input[name="agreement"]').is(':checked'))
                $('.pref-form').submit();
            else {
                $('input[name="agreement"]').parents('.form-group').addClass('req-attr');
                $('.agree-fr-pay').modal('show');
            }
            //$('.snc').hide();
        });
        $(document).on('click', '.sub', function (e) {
            e.preventDefault();
            var $ref = $('form');
            $ref.attr('action', '{{ url('/submission') }}');
            $ref.submit();
        });
        $(document).on('click', '.snc', function (e) {
            var $ref = $('form');
            $ref.attr('action', '{{url('/complete_later')}}');
            $ref.submit();
        });

        $(document).on('change', 'input[name="agreement"]', function (e) {
            if ($(this).is(':checked'))
                $(this).parents('.req-attr').removeClass('req-attr');
            else
                $(this).parents('.form-group').addClass('req-attr');

        })

        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('flights');
        });
    </script>
@endsection
