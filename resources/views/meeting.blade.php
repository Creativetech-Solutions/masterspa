@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_06.jpg') }});}
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

        
        <h1 class="page-title">Meetings</h1>

        
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
        $registration->meeting_participants = "";
    }
@endphp
<div class="container-fluid">
    <div class="container-page">   
            @include('layouts/notify')
        <h3 class="dark-grey">Meeting <br></h3>
        <form action="{{ url('/hotel') }}" method="POST" class="pref-form">
            {{ csrf_field() }}          
            <div class="col-lg-12">
                 <div class="form-group col-xs-12 col-sm-6">
                    <label>So we can provide appropriate seating in the meeting room, how many people from this registration will be attending the actual MEETING on October 30th?</label>
                </div>
                <div class="form col-xs-12 col-sm-6">
                    <input type="text" name="meeting" class="form-control" id="" value="{{$registration->meeting_participants}}">
                    <input type="hidden" name="url" value="" />
                </div>
            </div>
            <div class="col-md-8">

                <button class="btn btn-danger previous">&laquo; Previous</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        $(document).on('click','.previous', function(e){
            e.preventDefault();
            previouspage('additional');
        });
    </script>
@endsection
