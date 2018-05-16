@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_08.jpg') }});}
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

    
        

</div><!-- .page-content -->

@endsection
@section('content')
<h3>Contact us with any questions that you might have &#8211; we&#8217;ll be in touch within 24 hours. We look forward to hearing from you!</h3>




<h3 class="dark-grey">Contact Form</h3>
                
            <form action="{{ url('/prefrences') }}" method="POST">   
                {{ csrf_field() }}          
                <div class="col-xl-12">
                    <div class="form-group col-xl-12">
                        <label>Name:</label>
                        <input type="text" name="contactname"  class="form-control"  value="" placeholder="Your name">
                    </div>
                    
                    <div class="form-group col-xl-12">
                        <label>Email:</label>
                        <input type="email" name="contactmail" class="form-control"  id="" value="contactmail" placeholder="your email">
                    </div>
                    
                    <div class="form-group col-xl-12">
                        <label>Message:</label>
                        <textarea name="contactmessage" rows='5' class="form-control" id=""  value="contactmessage" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group col-xl-12">
                        <label>To make sure you're not a robot, what is thirteen minus six?:</label>
                        <input type="text" name="question"  class="form-control"  value="">
                    </div>
                 <div class="col-xl-12">
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
@endsection
