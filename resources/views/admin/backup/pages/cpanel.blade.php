
@extends('admin.layouts.nav-bar')

@section('content')
<div id="msgholder"></div>


<div id="message-box">

</div><!-- message-box -->
<div class="wrap clearfix">

    <div id="content-wrap">

        <div id="content">

            <div id="msgholder"></div>




            <script src="https://sagicorconvention.com/assets/admin/js/flot/jquery.flot.min.js" type="text/javascript"></script>

            <script src="https://sagicorconvention.com/assets/admin/js/flot/jquery.flot.resize.min.js" type="text/javascript"></script>

            <script src="https://sagicorconvention.com/assets/admin/js/flot/excanvas.min.js" type="text/javascript"></script>

            <p class="greentip"><i class="icon-lightbulb icon-3x pull-left"></i>Here you can view your latest user statistics.<br>

                such as number of registered, banned and pending users</p>

            <div class="row grid_24">

                <div class="col grid_6">

                    <div class="pagetip stats"><i class="icon-user"></i>

                        <div class="pull-right"> Registered Users<br>

                            <b class="pull-right">183</b> <br>

                        </div>

                    </div>

                </div>

                <div class="col grid_6">

                    <div class="pagetip stats"><i class="icon-ok-sign"></i>

                        <div class="pull-right"> Active Users <br>

                            <b class="pull-right">183</b> <br>

                        </div>

                    </div>

                </div>

                <div class="col grid_6">

                    <div class="pagetip stats"><i class="icon-time"></i>

                        <div class="pull-right"> Pending Users <br>

                            <b class="pull-right">0</b> <br>

                        </div>

                    </div>

                </div>

                <div class="col grid_6">

                    <div class="pagetip stats"><i class="icon-ban-circle"></i>

                        <div class="pull-right"> Banned Users <br>

                            <b class="pull-right">0</b> <br>

                        </div>

                    </div>

                </div>

            </div>



            <script type="text/javascript">

                // &lt;![CDATA[

                function getChart(range) {

                    $.ajax({

                        type: 'GET',

                        url: 'https://sagicorconvention.com/admin/CPanel/get_saleStats',

                        data : {

                            'getSaleStats' :1,

                            'timerange' : range

                        },

                        dataType: 'json',

                        async: false,

                        success: function (json) {

                            var option = {

                                shadowSize: 0,

                                lines: {

                                    show: true,

                                    fill: true,

                                    lineWidth: 1

                                },

                                grid: {

                                    backgroundColor: '#FFFFFF'

                                },

                                xaxis: {

                                    ticks: json.xaxis

                                }

                            }

                            $.plot($('#chart'), [json.order], option);

                        }

                    });

                }

                getChart(0);

                $(document).ready(function () {

                    $('#settingslist2 a').on('click', function () {

                        var type = $(this).attr('data-type')

                        getChart(type);

                    });

                });

                // ]]&gt;

            </script>
        </div>

    </div>

</div>
@endsection
