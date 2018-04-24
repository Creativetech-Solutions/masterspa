@extends('layouts.app')

@section('header')
<style id='activation-inline-css' type='text/css'>
.site-header{background-image:url(http://groupregistration.net/wp-content/uploads/2018/04/WebPhotoHeader_08.jpg);}
.site-title a,.site-title a:visited{color:#blank;}.site-title a:hover,.site-title a:visited:hover{color:rgba(, 0.8);}
.site-description{color:#ffffff;}
.hero,.hero .widget h1,.hero .widget h2,.hero .widget h3,.hero .widget h4,.hero .widget h5,.hero .widget h6,.hero .widget p,.hero .widget blockquote,.hero .widget cite,.hero .widget table,.hero .widget ul,.hero .widget ol,.hero .widget li,.hero .widget dd,.hero .widget dt,.hero .widget address,.hero .widget code,.hero .widget pre,.hero .widget .widget-title,.hero .page-header h1{color:#ffffff;}
.main-navigation ul li a,.main-navigation ul li a:visited,.main-navigation ul li a:hover,.main-navigation ul li a:visited:hover{color:#ffffff;}.main-navigation .sub-menu .menu-item-has-children > a::after{border-right-color:#ffffff;border-left-color:#ffffff;}.menu-toggle div{background-color:#ffffff;}.main-navigation ul li a:hover{color:rgba(255, 255, 255, 0.8);}
h1,h2,h3,h4,h5,h6,label,legend,table th,dl dt,.entry-title,.entry-title a,.entry-title a:visited,.widget-title{color:#353535;}.entry-title a:hover,.entry-title a:visited:hover,.entry-title a:focus,.entry-title a:visited:focus,.entry-title a:active,.entry-title a:visited:active{color:rgba(53, 53, 53, 0.8);}
body,input,select,textarea,input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="search"]:focus,input[type="number"]:focus,input[type="tel"]:focus,input[type="range"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="week"]:focus,input[type="time"]:focus,input[type="datetime"]:focus,input[type="datetime-local"]:focus,input[type="color"]:focus,textarea:focus,.navigation.pagination .paging-nav-text{color:#252525;}hr{background-color:rgba(37, 37, 37, 0.1);border-color:rgba(37, 37, 37, 0.1);}input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea,.select2-container .select2-choice{color:rgba(37, 37, 37, 0.5);border-color:rgba(37, 37, 37, 0.1);}select,fieldset,blockquote,pre,code,abbr,acronym,.hentry table th,.hentry table td{border-color:rgba(37, 37, 37, 0.1);}.hentry table tr:hover td{background-color:rgba(37, 37, 37, 0.05);}
blockquote,.entry-meta,.entry-footer,.comment-meta .says,.logged-in-as{color:#686868;}
.site-footer .widget-title,.site-footer h1,.site-footer h2,.site-footer h3,.site-footer h4,.site-footer h5,.site-footer h6{color:#ffffff;}
.site-footer .widget,.site-footer .widget form label{color:#ffffff;}
.footer-menu ul li a,.footer-menu ul li a:visited{color:#7c848c;}.site-info-wrapper .social-menu a{background-color:#7c848c;}.footer-menu ul li a:hover,.footer-menu ul li a:visited:hover{color:rgba(124, 132, 140, 0.8);}
.site-info-wrapper .site-info-text{color:#7c848c;}
a,a:visited,.entry-title a:hover,.entry-title a:visited:hover{color:#78c3fb;}.navigation.pagination .nav-links .page-numbers.current,.social-menu a:hover{background-color:#78c3fb;}a:hover,a:visited:hover,a:focus,a:visited:focus,a:active,a:visited:active{color:rgba(120, 195, 251, 0.8);}.comment-list li.bypostauthor{border-color:rgba(120, 195, 251, 0.2);}
button,a.button,a.button:visited,input[type="button"],input[type="reset"],input[type="submit"],.site-info-wrapper .social-menu a:hover{background-color:#78c3fb;border-color:#78c3fb;}button:hover,button:active,button:focus,a.button:hover,a.button:active,a.button:focus,a.button:visited:hover,a.button:visited:active,a.button:visited:focus,input[type="button"]:hover,input[type="button"]:active,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:active,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:active,input[type="submit"]:focus{background-color:rgba(120, 195, 251, 0.8);border-color:rgba(120, 195, 251, 0.8);}
button,button:hover,button:active,button:focus,a.button,a.button:hover,a.button:active,a.button:focus,a.button:visited,a.button:visited:hover,a.button:visited:active,a.button:visited:focus,input[type="button"],input[type="button"]:hover,input[type="button"]:active,input[type="button"]:focus,input[type="reset"],input[type="reset"]:hover,input[type="reset"]:active,input[type="reset"]:focus,input[type="submit"],input[type="submit"]:hover,input[type="submit"]:active,input[type="submit"]:focus{color:#ffffff;}
body{background-color:#ffffff;}.navigation.pagination .nav-links .page-numbers.current{color:#ffffff;}
.site-header{background-color:#2c3845;}.site-header{-webkit-box-shadow:inset 0 0 0 9999em;-moz-box-shadow:inset 0 0 0 9999em;box-shadow:inset 0 0 0 9999em;color:rgba(44, 56, 69, 0.50);}
.main-navigation-container,.main-navigation.open,.main-navigation ul ul,.main-navigation .sub-menu{background-color:#78c3fb;}
.site-footer{background-color:#303d4c;}
.site-info-wrapper{background-color:#2c3845;}.site-info-wrapper .social-menu a,.site-info-wrapper .social-menu a:visited,.site-info-wrapper .social-menu a:hover,.site-info-wrapper .social-menu a:visited:hover{color:#2c3845;}
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

        
        <h1 class="page-title">Contact Us</h1>

        
    </header><!-- .entry-header -->

</div><!-- .page-title-container -->

    </div>

</div>

            </div><!-- .site-header-wrapper -->

            <div class="page-content">

	
        

</div><!-- .page-content -->

@endsection
@section('content')
<h3>Contact us with any questions that you might have &#8211; we&#8217;ll be in touch within 24 hours. We look forward to hearing from you!</h3>

@endsection
