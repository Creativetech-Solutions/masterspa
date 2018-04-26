@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url(http://groupregistration.net/wp-content/uploads/2018/04/WebPhotoHeader_06.jpg);}
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
<form action="/masterspa/public/hotel">
<div class="col-lg-12">
                    
                     <div class="form-group col-lg-4">
                        <label>So we can provide appropriate seating in the meeting room, how many people from this registration will be attending the actual MEETING on October 30th?</label>
                        <input type="text" name="meeting" class="form-control" id="" value="">
                    </div>
                </div>
                <div class="col-md-8">
                    
                    <a href="/masterspa/public/additional" class="btn btn-danger">&laquo; Previous</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
@endsection
