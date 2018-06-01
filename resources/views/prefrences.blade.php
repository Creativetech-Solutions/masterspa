@extends('layouts.app')

@section('header')
    <style id='activation-inline-css' type='text/css'>
        .site-header {
            background-image: url({{ asset('public/images//WebPhotoHeader_07.jpg') }});
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
                $registration->specify_need = "";
                $registration->unique_id ="";
            }
    @endphp
    <div class="container-fluid">
        <div class="container-page">
            @include('layouts/notify')
            <div class="col-sm pull-right">
            <label>Your unique ID:</label>
                <input type="text" value="{{$registration->unique_id}}" readonly disabled>
            </div>
            <div style="background-color: lightgrey; padding: 8px" class="pull-left">
                <p style="color: red; margin: 0px"><b>Please note and save your unique ID, in order to return and see your information.</b></p>
            </div>
                <h3 class="dark-grey">Preferences</h3>
            <div class="col-xs-12">
                <label><h4>Bed types are based on availability, and are not guaranteed.
                        All rooms are non-smoking, there are designated outside areas for smoking.</h4>
                    <br></label>
            </div>
            <form action="{{ url('/guests') }}" class="pref-form" method="POST">
                {{ csrf_field() }}
                <div class="col-lg-12">


                    <div class="form-group col-lg-4">
                        <label>Prefrences:</label><br>
                        <input type="radio" name="preference"
                               {{ $registration->preference == 'king' ? 'checked':'' }} value="king"/> King<br>
                        <input type="radio" name="preference"
                               {{ $registration->preference=='beds' ? 'checked':'' }} value="beds"/> 2 Beds<br>
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Does Anyone in this room have any Special Needs or Dietary/Physical Restrictions?</label><br>
                        <input type="radio" name="needs"
                               {{ $registration->special_need=='yes' ? 'checked':'' }}  value="yes"/> Yes<br>
                        <input type="radio" name="needs"
                               {{ $registration->special_need=='no' ? 'checked':'' }}  value="no"/> No<br>
                        <input type="hidden" name="url" value=""/>
                    </div>
                    <div id="s_need" class="col-lg-4" style="display: {{$registration->special_need == 'yes' ?'block':'none'}}">
                        <label>Please Specify:</label>
                        <input type="text" name="specify_need" value="{{$registration->specify_need}}"
                               class="form-control" placeholder="Specify here">
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
        $('input[name="needs"]').click(function () {
            var val = $(this).val();
            if (val == 'yes') {
                $('#s_need').show();
            } else {
                $('#s_need').hide();
            }
        });
        $(document).on('click', '.previous', function (e) {
            e.preventDefault();
            previouspage('/');
        });
    </script>
@endsection
