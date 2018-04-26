@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url(http://groupregistration.net/wp-content/uploads/2018/04/WebPhotoHeader_01-1.jpg);}
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

        
        <h1 class="page-title">Agreement</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

@endsection
@section('content')
<h3>CANCELLATIONS ARE SUBJECT TO CHARGES:
120-61 DAYS PRIOR TO CONFERENCE: 1 NIGHT PER PERSON CHARGE;
60-31 DAYS PRIOR: 2 NIGHTS PER PERSON CHARGE;
30 DAYS AND LESS: 100% CHARGE.
</h3>
<form action="/masterspa/public/agreement">
	<div class="col-lg-12">
                    <div class="form-group col-lg-4">
                        <br>
                        <label>If Applicable, An Invoice Will Be Sent Based On Your Above Selections and Their Availability, Once Confirmed:</label><br>
                        <input type="radio" name="agreement" value="I agree to Pay The Charges Based on My Selections Once Available and Approved.">I agree to Pay The Charges Based on My Selections Once Available and Approved.<br>
                        
                       
                        
                        </div>
                    
                    <div class="form-group col-lg-8">
                    	<br>	
                        <label>Special Circumstances or Notes:</label><br>
                        <input type="textarea"  name="specialnotes" class="form-control" id="" value="" placeholder="">
                    </div>
                        
                    </div>

    <div class="col-lg-12">
                  
                    <div class="form-group col-lg-6">
                    	<br>	
                        <label>Save Information:</label><br>
                        <input type="checkbox" name="agreement" value="Checking this option will save your information for future registrations">{Checking this option will save your information for future registrations}<br>
                        
                    </div>
    </div>
    <div class="col-md-6">
    	            <a href="/masterspa/public/flights" class="btn btn-primary">&laquo; Previous</a>
                    <button type="submit" class="btn btn-primary">Submit Registration</button><br>
    </div>
            </form>
@endsection
