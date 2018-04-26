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

        
        <h1 class="page-title">Prefrences</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

@endsection
@section('content')
<h3>Bed Types Are Based on Availablity, And Are Not Guaranteed. 
All rooms are non-smoking, there are designated outside areas for smoking.</h3>

<form action="/masterspa/public/guests">             
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <label>Prefrences:</label><br>
                        <input type="checkbox" name="beds" value="king">King<br>
                        <input type="checkbox" name="beds" value="beds">2 Beds<br>
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Does Anyone in this room have any Special Needs or Dietary/Physical Restrictions?</label><br>
                        <input type="checkbox" name="needs" value="yes">Yes<br>
                        <input type="checkbox" name="needs" value="no">No<br>
                    </div>
                    
                </div>
                <div class="col-md-8">
                    
                    <a href="/masterspa/public/" class="btn btn-danger">&laquo; Previous</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
@endsection
