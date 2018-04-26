@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_02.jpg') }});}
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

		
		<h1 class="page-title">Additional Attendees</h1>

		
	</header><!-- .entry-header -->

</div><!-- .page-title-container -->

	</div>

</div>

			</div><!-- .site-header-wrapper -->

@endsection
@section('content')

<div class="container-fluid">
    <div class="container-page">   
        <h3 class="dark-grey">Additional Attendees</h3>
        <div class="col-xs-12">
            <h4>Master Spas is covering the cost for 2 persons per room.
    You may bring additional people at the below charge.
     Cost includes 2 nights hotel, (3 Nights for European Dealers),
      Participation in, and Meals at, Master Spas Events, Park ticket for event,
       Round Trip Airport Transfers between the Orlando Airport and the Walt Disney World Swan Resort.
         Please note additional children are not charged for, and will not receive, a cash card so you 
         can determine your own level of spending.</h4>
            <br>
        </div>
        <form action="{{ url('/meeting') }}">             
            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                    <label>I am Registering Additional Attendees for Program Dates 
                           IN MY ROOM (Additional Night Costs added Below)
                           Hotel Considers anyone over 9 years as an adult for meal and ticket purposes:</label><br>
                    <input type="radio" name="attandees" value="3rd Adult in 1 room ( 9 years and Older) Program Dates Only">3rd Adult in 1 room ( 9 years and Older) Program Dates Only <p>$425.00</p>
                    <input type="radio" name="attandees" value="3rd and 4th Adult in 1 room ( 9 years and Older ) Program Dates Only $425 per person">3rd and 4th Adult in 1 room ( 9 years and Older ) Program Dates Only $425 per person <p>$850.00</p>
                </div>
                
                <div class="form-group col-lg-6">
                	<br>
                	<br>
                	<br>
                    <input type="radio" name="attandees" value="1 Child 3-8 years in room with 2 adults Program Dates Only">1 Child 3-8 years in room with 2 adults Program Dates Only <p>$325.00</p>
                    <input type="radio" name="attandees" value="2 Children 3-8 years in room with 2 adults Program Dates Only">2 Children 3-8 years in room with 2 adults Program Dates Only<p>$650.00</p>
                </div>
                
            </div>

            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                   
                    <input type="radio" name="attandees" value="3 Children 3-8 years in room with 2 adults Program Dates Only">3 Children 3-8 years in room with 2 adults Program Dates Only<p>$975.00</p>
                    <input type="radio" name="attandees" value="1 Adult (9 years & older and 1 child (3-8 years) Program Dates only">1 Adult (9 years & older and 1 child (3-8 years) Program Dates only<p>$750.00</p>
                </div>
                
                <div class="form-group col-lg-6">
                	
                    <input type="radio" name="attandees" value="1 Adult (9 years & older) and 2 children (3-8 years) Program Dates Only">1 Adult (9 years & older) and 2 children (3-8 years) Program Dates Only<p>$1075.00</p>
                    <input type="radio" name="attandees" value="Children Under 3 years are FREE">Children Under 3 years are FREE<p>$0.00</p>
                </div>
                
            </div>
            <p>Click here to clear selection for question above</p>
            <div class="col-md-8">
                
                <a href="#" class="btn btn-danger">&laquo; Previous</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>
@endsection