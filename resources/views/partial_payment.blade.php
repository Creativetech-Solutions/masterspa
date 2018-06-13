@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images//WebPhotoHeader_01-1.jpg') }});
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


                        <h1 class="page-title">
                            <Payments></Payments>
                        </h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

@endsection


@section('content')

    <div class="container-fluid">
        <div class="container-page" style="padding-bottom:230px;">

            <div class="alert alert-danger">
                <strong>Mr/Ms.{{$registration->fname}} your payment is incomplete your due amount
                    is {{$partial_response['due_amount']}} please complete your payment. </strong>
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
            <div class="col-xs-12">
                        <span class="card-imgs"
                              style="background-image: url({{ asset('public/images/creditcards.svg') }})"></span>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="total" value="{{$partial_response['due_amount']}}">
                <input type="hidden" name="id"  value="{{$registration->id}}">
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-5">
                        <label>Name</label>
                        <input type="text" name="first_name" class="form-control"
                               value="{{$partial_response['first_name']}}"/>
                    </div>
                    <div class="form-group col-xs-12 col-sm-5">
                        <label>Credit Card Number</label>
                        <input type="text" name="cc_num" class="form-control"
                               value="{{$partial_response['due_amount']}}"/>
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
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
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
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary complete" style="color:white">Complete
                        Payment
                    </button>
                    <button  type="submit" class="btn btn-danger cancel" style="color:white">Cancel Payment</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
    jQuery(document).on('click', '.complete', function (e) {
        /*e.preventDefault();*/
        var $ref = $('form');
        $ref.attr('action', '{{ url('/complete_payment') }}');
        $ref.submit();
    });
    jQuery(document).on('click', '.cancel', function (e) {
        var $ref = $('form');
        $ref.attr('action', '{{ url('/cancel_payment/'.$registration->id)}}');
        $ref.submit();
    });
</script>
@endsection