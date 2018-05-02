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
            <label><h4>Master Spas is covering the cost for 2 persons per room.
    You may bring additional people at the below charge.
     Cost includes 2 nights hotel, (3 Nights for European Dealers),
      Participation in, and Meals at, Master Spas Events, Park ticket for event,
       Round Trip Airport Transfers between the Orlando Airport and the Walt Disney World Swan Resort.
         Please note additional children are not charged for, and will not receive, a cash card so you 
         can determine your own level of spending.</h4></label>
            <br>
        </div>
        <form action="{{ url('/meeting') }}" class="pref-form">
                <div class="col-lg-12">
                    <div class="form-group col-xs-12">
                        <label>I am Registering Additional Attendees for Program Dates 
                               IN MY ROOM (Additional Night Costs added Below)
                               Hotel Considers anyone over 9 years as an adult for meal and ticket purposes:</label><br>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="3rd Adult in 1 room ( 9 years and Older) Program Dates Only"> 3rd Adult in 1 room ( 9 years and Older) Program Dates Only  | <label>$425.00</label>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="3rd and 4th Adult in 1 room ( 9 years and Older ) Program Dates Only $425 per person"> 3rd and 4th Adult in 1 room ( 9 years and Older ) Program Dates Only $425 per person  | <label>$850.00</label>
                    </div>
                </div> 
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="1 Child 3-8 years in room with 2 adults Program Dates Only"> 1 Child 3-8 years in room with 2 adults Program Dates Only  | <label>$325.00</label>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="2 Children 3-8 years in room with 2 adults Program Dates Only"> 2 Children 3-8 years in room with 2 adults Program Dates Only | <label>$650.00</label>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-6">
                       
                        <input type="radio" name="attandees" value="3 Children 3-8 years in room with 2 adults Program Dates Only"> 3 Children 3-8 years in room with 2 adults Program Dates Only | <label>$975.00</label>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="1 Adult (9 years & older and 1 child (3-8 years) Program Dates only"> 1 Adult (9 years & older and 1 child (3-8 years) Program Dates only | <label>$750.00</label>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-sm-6">
                    	
                        <input type="radio" name="attandees" value="1 Adult (9 years & older) and 2 children (3-8 years) Program Dates Only"> 1 Adult (9 years & older) and 2 children (3-8 years) Program Dates Only | <label>$1075.00</label>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <input type="radio" name="attandees" value="Children Under 3 years are FREE"> Children Under 3 years are FREE | <label>$0.00</label>
                        <input type="hidden" name="url" value="" />
                    </div>
                    
                </div>
                <div class="col-xs-12">
                    
                     <p>Click here to clear selection for question above</p>


                    <button class="btn btn-danger previous">&laquo; Previous</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).on('click','.selecturl', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var result = url.substring(url.lastIndexOf("/") + 1);
            previouspage(result);
        });
        $(document).on('click','.previous', function(e){
            e.preventDefault();
            previouspage('guests');
        });
        function previouspage(url){
            $('input[name="url"]').val(url);
            $('.pref-form').submit();
        }


    </script>
@endsection