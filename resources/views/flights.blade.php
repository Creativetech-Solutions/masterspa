@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url(http://groupregistration.net/wp-content/uploads/2018/04/WebPhotoHeader_04.jpg);}
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
<h3>Flight costs are the responsibility of the attendee.
If you would like a quote for airfare, please fill out the information below.

If you book your own flights, please forward a copy of your entire itinerary to Masterspas@latitudeevents.com so we can arrange for your complimentary transportation between the Orlando airport ( Airport code: MCO) and the hotel on arrival and departure.

If you would like to extend your trip, please let us know PRIOR to booking any flights, so we can confirm availability at the hotel.</h3>
<form action="/masterspa/public/agreement">
<div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <br><br>
                        <label>Would You Like A Quote for Airfare?</label><br>
                        <input type="radio" name="flights" value="yes">YES<br>
                        <input type="radio" name="flights" value="NO. I am driving.">NO. I am driving.<br>
                        <input type="radio" name="flights" value="NO, I will be booking my own airfare and will email my itinerary once booked.">NO, I will be booking my own airfare and will email my itinerary once booked.<br>
                        
                        </div>
                    
                    <div class="form-group col-lg-6">
                    	<br><br>	
                        <label>Class of Service:</label><br>
                        <input type="checkbox" name="flights" value="Coach">Coach<br>
                        <input type="checkbox" name="flights" value="Business/First Class">Business/First Class<br>
                        
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
                        <input type="radio" name="flights" value="An Invoice Will Be Sent If Applicable">An Invoice Will Be Sent If Applicable<br>
                        <input type="radio" name="flights" value="Credit Card">Credit Card<br>
                       
                        
                        </div>
                    
                    <div class="form-group col-lg-8">
                    	<br>	
                        <label>Special Notes:</label><br>
                        <input type="textarea"  name="snotes" class="form-control" id="" value="" placeholder="">
                    </div>
                        
                    </div>
</div>
                <div class="col-md-6">
                	<a href="/masterspa/public/flights" class="btn btn-danger">&laquo; Previous</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
@endsection
