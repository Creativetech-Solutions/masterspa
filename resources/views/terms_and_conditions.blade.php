@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url({{ asset('public/images/WebPhotoHeader_08.jpg') }});}
input[type=text], input[type=email] {
    width: 100%;
    padding: 25px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
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

        
        <h1 class="page-title">Terms &amp; Conditions</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

            <div class="page-content">

    
        

</div><!-- .page-content -->

@endsection
@section('content')

<div class="container-fluid">
    <div class="container-page">
        <h4 class="dark-grey">Terms &amp; Conditions: </h4>
        <div class="col-xs-12">
            <label>All of the following policies constitute the terms and conditions of the use of this website. At all times, The Island Services reserves the right to modify these policies, and use of this site constitutes agreement to the policies in their entirety. Other than the content which you, the user, add to the site, The Island Services reserves all rights to the contents of the website and users are granted limited license specifically for the viewing of the materials contained within the site. In no event shall The Island Services, nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website.<br>
               
            </label><br><br>
        </div>
        <h4 class="dark-grey">Privacy Policy: </h4>
        <div class="col-xs-12">
            <label> Use of this website may include use and retention of your data as part of the purchase and fulfillment process. We do not sell or distribute your personally identifying information to any parties, except in instances when doing so would be required to fulfill your purchase agreement.
            </label>
        </div>
    </div>
</div>       
@endsection
