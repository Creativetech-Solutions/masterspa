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


                        <h1 class="page-title"><Payments></Payments></h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

@endsection


@section('content')

    <div class="container-fluid">
        <div class="container-page" style="padding-bottom:230px;">

                <div class="alert alert-warning">
                    <strong>Your Payment is incomplete please go back to complete your payment. </strong>
                </div>
                <div class="col-xs-12">
                    <a class="btn btn-primary" href="{{ url('/') }}" style="color:white">Complete Payment</a>
                </div>
            <div class="col-xs-12">
                <a class="btn btn-primary" href="{{ url('/') }}" style="color:white">Back</a>
            </div>

                <div class="alert alert-success">
                    <strong>Hi </strong></p>
                </div>

                <a class="btn btn-primary" href="{{ url('/') }}" style="color:white">Review Registration</a>

        </div>
    </div>
@endsection

