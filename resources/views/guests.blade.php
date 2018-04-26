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

        
        <h1 class="page-title">Guests</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

@endsection
@section('content')
<div class="container-fluid">
    <div class="container-page">   
        <h3 class="dark-grey">Guest Details</h3>
        <div class="col-xs-12">
        	<h4>Please Enter Names of All Guests Attending Below.
			Please Use Names Exactly As They Appear on the Documents You Are Using for Identification.

			Please Type Carefully Using Correct Capitalization and Spelling!
			Your Trip Documents Will Be Created from Your Input.</h4>
			<br>
        </div>
        <form action="{{ url('/prefrences') }}">             
            <div class="col-lg-12">
                <div class="form-group col-xs-12">
                	<div class="col-xs-6 col-sm-4">
                    	<label>How Many Travelers in this Room?</label>
                    </div>
                	<div class="col-xs-6">
                    <input type="radio" name="num_of_travler" value="1" checked="checked"> 1 &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="num_of_travler" value="2"> 2 &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="num_of_travler" value="3"> 3 &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="num_of_travler" value="4"> 4 &nbsp;&nbsp;&nbsp;
                    </div>
                </div>

                <div class="main-attendi-wrapper">
	                <div id="attendi_1" class="col-xs-12 attendi-wraper">
	                	<div class="col-xs-12 heading"><h4>Attendee <span class="attendi-num">1</span></h4></div>
		                <div class="col-lg-12">
		                    <div class="form-group col-lg-4">
		                        <label>First Name AS ON ID:</label>
		                        <input type="text" name="gfname[]" required class="form-control" placeholder="Guest First Name">
		                    </div>
		                    
		                    <div class="form-group col-lg-4">
		                        <label>First Name Preferred on Name Badge:</label>
		                        <input type="text" name="gbadgefname[]" class="form-control" required placeholder="Badge First Name">
		                    </div>
		                    
		                    <div class="form-group col-lg-4">
		                        <label>Middle Name AS ON ID:</label>
		                        <input type="text" name="gmiddle_name[]" class="form-control" required placeholder="Middle Name">
		                    </div>
		                </div>
		                <div class="col-lg-12">
		                    <div class="form-group col-lg-4">
		                        <label>Last Name AS ON ID:</label>
		                        <input type="text" name="glname[]" required class="form-control" placeholder="Last Name">
		                    </div>
		                    
		                    <div class="form-group col-lg-4">
		                        <label>T-shirt size:</label>
		                        <input type="text" name="gshirtsize" class="form-control" required placeholder="Shirt Size">
		                    </div>
		                </div>
	                </div>
                </div>
            </div>

            <div class="col-md-8">
                
                
                <a href="#" class="btn btn-danger">&laquo; Previous</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on('click','input[name="num_of_travler"]', function() {
       $('.attendi-one').show();
       var val = $(this).val();
       var currAttendi = $('.attendi-wraper').length;
       console.log('Val :'+val);
       console.log('currAttendi : '+currAttendi);
       if(currAttendi > val){
            for(var i = currAttendi-1; i>=val; i--){
                $('.attendi-wraper')[i].remove();
            }
       } else {
            for(var i = currAttendi; i<val; i++){
                var attendi = $('#attendi_1').clone().prop('id','attendi_'+(i+1));
                $('.main-attendi-wrapper').append(attendi);
                $('#attendi_'+(i+1)).find('.attendi-num').html(i+1);
            }
       }
    });
</script>
@endsection