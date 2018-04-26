@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_04.jpg') }});}
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

        
        <h1 class="page-title">Flights</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

@endsection
@section('content')
<div class="container-fluid">
    <div class="container-page">   
        <h3 class="dark-grey">Flights</h3>
        <div class="col-xs-12">
            <h4>
        If you would like to extend your trip AT THE SWAN Resort - please fill out the below information.
        We will confirm availability for you.
        Master Spas has special rates 3 days before and 3 days after the program, however rooms are based on availability. Rates include all taxes and fees including resort fee.  Meals are NOT included on extended nights
        For Pre and Post Rooms - all Children under the age of 18 years are Free in the room with 2 Adults.
        Please DO NOT book any flights for additional nights prior to receiving confirmation that the room is available.</h4>
            <br>
        </div>
        <form action="{{ url('/agreement') }}">
            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                    <br><br>
                    <label>Would You Like A Quote for Airfare?</label><br>
                    <input type="radio" name="flights" value="yes"> YES<br>
                    <input type="radio" name="flights" value="NO. I am driving."> NO. I am driving.<br>
                    <input type="radio" name="flights" value="NO, I will be booking my own airfare and will email my itinerary once booked."> NO, I will be booking my own airfare and will email my itinerary once booked.<br>
                    
                    </div>
                
                <div class="form-group col-lg-6">
                	<br><br>	
                    <label>Class of Service:</label><br>
                    <input type="checkbox" name="flights" value="Coach"> Coach<br>
                    <input type="checkbox" name="flights" value="Business/First Class"> Business/First Class<br>
                    
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="form-group col-lg-4">
                    <label>Departure City:</label>
                    <input type="text" name="dcity"  class="form-control" id="" value="">
                </div>
                
                <div class="form-group col-lg-4">
                    <label>Departure Date:</label>
                    <input type="date" name="ddate" class="form-control"  id="" value="" placeholder="">
                </div>
                
                <div class="form-group col-lg-4">
                    <label>Preferred Departure Time:</label>
                    <input type="time" name="pdtime" class="form-control"  id="" value="" placeholder="">
                </div>
            </div>


            <div class="col-lg-12">
                <div class="form-group col-lg-4 ">
                 <label>Return Date:</label>
                 <input class="form-control"  type="date" name="rdate" value="" id="" placeholder="" >
                 </div>
                                
                <div class="form-group col-lg-4">
                    <label>Preferred Return Time:</label>
                    <input type="time" name="prtime" class="form-control" id="" value="">
                </div>
                
                <div class="form-group col-lg-4">
                    <label>Preferred Airline:</label>
                    <input type="text"  name="pairline" class="form-control" id="" value="" placeholder="">
                </div>

            </div>

            <div class="col-lg-12">
                <div class="form-group col-lg-4">
                    <label>Frequent Flyer #:</label>
                    <input type="text" name="fflyer"  class="form-control" id="" value="" placeholder="">
                </div>

            </div> 

            <div class="col-lg-12">
                <div class="form-group col-lg-4">
                    <br>
                    <label>Method of Payment:</label><br>
                    <input type="radio" name="flights" value="An Invoice Will Be Sent If Applicable"> An Invoice Will Be Sent If Applicable<br>
                    <input type="radio" name="flights" value="Credit Card"> Credit Card<br>
                   
                    
                    </div>
                
                <div class="form-group col-lg-8">
                	<br>	
                    <label>Special Notes:</label><br>
                    <input type="textarea"  name="snotes" class="form-control" id="" value="" placeholder="">
                </div>
                    
            </div>
            <div class="col-md-6">
            	<a href="#" class="btn btn-danger">&laquo; Previous</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>
@endsection
