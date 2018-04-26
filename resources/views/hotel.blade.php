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

        
        <h1 class="page-title">Hotel</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

@endsection
@section('content')
<h3>If you would like to extend your trip AT THE SWAN Resort - please fill out the below information.
We will confirm availability for you.


Master Spas has special rates 3 days before and 3 days after the program, however rooms are based on availability. Rates include all taxes and fees including resort fee.  Meals are NOT included on extended nights



For Pre and Post Rooms - all Children under the age of 18 years are Free in the room with 2 Adults.

 

Please DO NOT book any flights for additional nights prior to receiving confirmation that the room is available.</h3>
<form action="/masterspa/public/flights">
<div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <br><br>
                        <label>Would you like to extend your trip either by arriving before the program starts or staying after the program ends?</label><br>
                        <input type="radio" name="hotel" value="yes">Yes<br>
                        <input type="radio" name="hotel" value="no">No<br>
                    </div>
                    
                    <div class="form-group col-lg-6">
                    	<br><br>
                    	<label>I am a European Dealer:</label><br><br>	
                        <input type="radio" name="hotel" value="no">No<br>
                        <input type="radio" name="hotel" value="Yes - European Dealers arrive October 28 and Depart Oct 31">Yes - European Dealers arrive October 28 and Depart Oct 31
                    </div>
                    
                </div>

                <strong>EUROPEAN DEALERS PLEASE NOTE: Master Spas is covering your stay for an additional night:   Arriving: October 28, 2017 and Departing: October 31, 2017</strong>
                 
                 <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <br><br>
                        <label>The event STARTS Sunday October 29, 2017
                           What date would you like to ARRIVE?
                        RATES ARE ROOM ONLY and include taxes- NO MEALS ARE INCLUDED:</label><br>
                        <input type="radio" name="hotel" value="Arrive Thursday October 26, 2017 -SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night ">Arrive Thursday October 26, 2017 -SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night <p>$885.00</p>
                        <input type="radio" name="hotel" value="Arrive Friday October 27, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night">Arrive Friday October 27, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night<p>$590.00</p>
                    </div>
                    
                    <div class="form-group col-lg-6">
                    	<br><br><br><br><br>	
                        <input type="radio" name="hotel" value=" Arrive Saturday October 28, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night "> Arrive Saturday October 28, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night<p>$295.00</p>
                        <input type="radio" name="hotel" value="Arrive Sunday October 29, 2017 - NORMAL ARRIVAL DATE - SINGLE/DOUBLE Occupancy - No Additonal Charge">Arrive Sunday October 29, 2017 - NORMAL ARRIVAL DATE - SINGLE/DOUBLE Occupancy - No Additonal Charge<p>$0.00</p>
                    </div>
                    
                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        
                        <input type="radio" name="hotel" value=" EUROPEAN DEALERS - ARRIVE OCTOBER 28 AT NO ADDITIONAL COST."> EUROPEAN DEALERS - ARRIVE OCTOBER 28 AT NO ADDITIONAL COST.<p>$0.00</p>
                    </div>
                
                </div>


                 <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <br><br>
                        <label>The event ENDS Tuesday October 31, 2017
                          If Extending, What date would you like to DEPART?
                         RATES ARE ROOM ONLY and include taxes- NO MEALS ARE INCLUDED.:</label><br>
                        <input type="radio" name="hotel" value=" Depart Tuesday October 31, 2017 - Normal Departure Date - No Additional Charge"> Depart Tuesday October 31, 2017 - Normal Departure Date - No Additional Charge<p>$0.00</p>
                        <input type="radio" name="hotel" value=" Depart Wednesday November 1, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night"> Depart Wednesday November 1, 2017 -SINGLE/DOUBLE Occupancy 1 Nt $295 Per Room Per Night<p>$295.00</p>
                    </div>
                    
                    <div class="form-group col-lg-6">
                    	<br><br><br><br><br>	
                        <input type="radio" name="hotel" value=" Depart Thursday November 2, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night "> Depart Thursday November 2, 2017 -SINGLE/DOUBLE Occupancy 2 Nts $295 Per Room Per Night <p>$590.00</p>
                        <input type="radio" name="hotel" value="Depart Friday November 3, 2017 SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night">Depart Friday November 3, 2017 SINGLE/DOUBLE Occupancy 3 Nts $295 Per Room Per Night<p>$885.00</p>
                    </div>
                    
                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <br><br>
                        <label>I am Registering Additional Attendees for Extended Nights.IN MY ROOM.
                          Additional people under 18 years old in a room with 2 Adults are FREE.:</label><br>
                        <input type="radio" name="hotel" value="3rd Adult in room ( over 18 years ) 1 Night in Addition to Program Nights "> 3rd Adult in room ( over 18 years ) 1 Night in Addition to Program Nights <p>$25.00</p>
                        <input type="radio" name="hotel" value="3rd Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights">3rd Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights<p>$50.00</p>
                    </div>
                    
                    <div class="form-group col-lg-6">
                    	<br><br><br><br>	
                        <input type="radio" name="hotel" value=" 3rd Adult in room ( over 18 years ) 3 Nights in Addition to Program Nights"> 3rd Adult in room ( over 18 years ) 3 Nights in Addition to Program Nights<p>$75.00</p>
                        <input type="radio" name="hotel" value="3rd & 4th Adult in room ( over 18 years ) 1 Night in Addition to Program Nights ">3rd & 4th Adult in room ( over 18 years ) 1 Night in Addition to Program Nights <p>$50.00</p>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <input type="radio" name="hotel" value="3rd & 4th Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights ">3rd & 4th Adult in room ( over 18 years ) 2 Nights in Addition to Program Nights <p>$100.00</p>
                    </div>

                    <div class="form-group col-lg-6">
                        <input type="radio" name="hotel" value="3rd & 4th Adult in room (over 18 years ) 3 Nights in Addition to Program Nights">3rd & 4th Adult in room (over 18 years ) 3 Nights in Addition to Program Nights<p>$150.00</p>
                    </div>
                
                </div>
                 <div class="col-md-6">
                 	<a href="/masterspa/public/meeting" class="btn btn-danger">&laquo; Previous</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
@endsection
