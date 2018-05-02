@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images//WebPhotoHeader_01-1.jpg') }});}
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

        
        <h1 class="page-title">Prefrences</h1>

        
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
        $registration->preference = "";
        $registration->special_need = "";
    }
@endphp
<div class="container-fluid">
    <div class="container-page">
        @include('layouts/notify')  
        <h3 class="dark-grey">Preferences</h3>
        <div class="col-xs-12">
            <label><h4>Bed Types Are Based on Availablity, And Are Not Guaranteed. 
                All rooms are non-smoking, there are designated outside areas for smoking..</h4>
            <br></label>
        </div>
        <form action="{{ url('/guests') }}" class="pref-form" method="POST">
            {{ csrf_field() }}                       
            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                    <label>Prefrences:</label><br>
                    <input type="radio" name="preference" {{ $registration->preference == 'king' ? 'checked':'' }} value="king" /> King<br>
                    <input type="radio" name="preference" {{ $registration->preference=='beds' ? 'checked':'' }} value="beds" /> 2 Beds<br>
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Does Anyone in this room have any Special Needs or Dietary/Physical Restrictions?</label><br>
                    <input type="radio" name="needs" {{ $registration->special_need=='yes' ? 'checked':'' }}  value="yes" /> Yes<br>
                    <input type="radio" name="needs" {{ $registration->special_need=='no' ? 'checked':'' }}  value="no" /> No<br>
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
    <script type="text/javascript">
        $(document).on('click','.selecturl', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var result = url.substring(url.lastIndexOf("/") + 1);
            previouspage(result);
        });
        $(document).on('click','.previous', function(e){
            e.preventDefault();
            previouspage('/');
        });
        function previouspage(url){
            $('input[name="url"]').val(url);
            console.log(url);
            $('.pref-form').submit();

        }
    </script>
@endsection
