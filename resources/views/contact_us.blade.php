@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images/WebPhotoHeader_08.jpg') }});
        }

        input[type=text], input[type=email] {
            width: 100%;
            padding: 25px 20px;
            margin: 8px 0;
            box-sizing: border-box;
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


                        <h1 class="page-title">Contact Us</h1>


                    </header><!-- .entry-header -->

                </div><!-- .page-title-container -->

            </div>

        </div>

    </div><!-- .site-header-wrapper -->

    <div class="page-content">


    </div><!-- .page-content

Ok, the BGI box is now running, the hamachi url is http://25.68.206.199/bumblebee-bgi/. However, replication is not implemented yet. Please check, and let me know should we implement the replication now.
-->

@endsection
@section('content')
    <div class="container-fluid">
        <div class="container-page">
            <h3 class="dark-grey">Contact Us</h3>
            <div class="col-xs-12">
                <label><h4>
                        Contact us with any questions that you might have &#8211; we&#8217;ll be in touch within 24
                        hours. We look forward to hearing from you! <br>
                    </h4>
                </label>
            </div>

            <form action="{{ url('/contact_us') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 row">
                        <label>Name:</label>
                        <input type="text" name="contactname" class="form-control" value="" placeholder="Your name">
                    </div>

                    <div class="form-group col-xs-12 row">
                        <label>Email:</label>
                        <input type="email" name="contactmail" class="form-control" id="" value="contactmail"
                               placeholder="your email">
                    </div>

                    <div class="form-group col-xs-12 row">
                        <label>Message:</label>
                        <textarea name="contactmessage" rows='5' class="form-control" id="" value="contactmessage"
                                  placeholder=""></textarea>
                    </div>
                    <div class="form-group col-xs-12 row">
                        <label>To make sure you're not a robot, what is thirteen minus six?:</label>
                        <input type="text" name="question" class="form-control" value="">
                    </div>
                </div>
                <div class="col-xs-12 row">
                    <label class="col-xs-12">
                        <a target="_blank" href="https://www.google.com/maps/place/2140+NW+188th+Terrace,+Pembroke+Pines,+FL+33029,+USA/@26.0212295,-80.4029975,17z/data=!3m1!4b1!4m5!3m4!1s0x88d9a171be361a97:0xd77e8543f391a8bb!8m2!3d26.0212295!4d-80.4008088">2140
                            NW 188th Terrace</a>
                        <h5>Pembroke Pines</h5>
                        <h5>FL 33029</h5>
                    </label>
                    <div class="col-xs-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
