@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>

.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_01-1.jpg') }});}
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
@php 
    if(empty($registration->id)){ 
        $registration = new \stdClass();
        $registration->save_info = "";
        $registration->send_invoice = "";
        $registration->special_circumstances = "";
    }
@endphp
<div class="container-fluid">
    <div class="container-page">   
        <h3 class="dark-grey">Agreement</h3>
        <div class="col-xs-12">
            <label><h4>Cancellations are subject to charges:
                120-61 days prior to conference: 1 night per person charge;
                60-31 days prior: 2 nights per person charge;
                30 days and less: 100% charge.</h4></label>
            <br>
        </div>
        <form action="{{ url('/submission') }}" method="POST" class="pref-form">
            {{ csrf_field() }}          
        	<div class="col-xs-12">
                <div class="form-group col-xs-12 col-sm-6">
                    <label>If Applicable, An Invoice Will Be Sent Based On Your Above Selections and Their Availability, Once Confirmed:</label>
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="radio" name="agreement" {{ $registration->send_invoice == 1 ? 'checked':'' }} value="1"> I agree to Pay The Charges Based on My Selections Once Available and Approved.<br>
                </div>
            </div>
            <div class="col-xs-12">
                
                <div class="form-group col-xs-12 col-sm-6">
                    <label>Special Circumstances or Notes:</label>
                </div>
                <div class="form-group col-xs-12">
                    <textarea name="specialnotes" class="form-control" id="" placeholder="">{{ $registration->special_circumstances }}</textarea>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group col-xs-12">
                	<br>	
                    <label>Save Information:</label><br>
                    <input type="checkbox" name="save_info" {{ $registration->save_info == 1 ? 'checked':'' }} value="1"> {Checking this option will save your information for future registrations}<br>
                    
                </div>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="url" value="" />
                <button class="btn btn-danger previous">&laquo; Previous</button>
                <button type="submit" class="btn btn-primary">Submit Registration</button><br>
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
            previouspage('flights');
        })
        function previouspage(url){
            $('input[name="url"]').val(url);
            $('.pref-form').submit();
        }
    </script>
@endsection
