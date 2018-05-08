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
    <div class="container-fluid">
        <div class="container-page" style="padding-bottom:230px;">

                <p style="font-size: xx-large">Thank you for submitting your registration</p>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts/script')
    <script type="text/javascript">
        $(document).on('click','.previous', function(e){
            e.preventDefault();
            previouspage('/');
        });
    </script>
@endsection
