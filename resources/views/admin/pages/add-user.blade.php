@include('admin/layouts/nav-bar')
<body>
<div style="display: none;" id="loader"></div>
<!-- navbar  -->
<div id="navbar">
    <div class="container">
        <div class="row grid_24 clearfix">
            <div class="col grid_5"> <a href="http://localhost/sagicorconvention/admin/CPanel">
                    <img src="http://localhost/sagicorconvention/assets/admin/images/Sagicor2018Logo_admin.png" alt="Sagicor Convention 2018 | Montreal" class="logo"></a> </div>
            <!-- admin/images/logo.png -->

            <div class="col grid_19">
                <p class="flright">Welcome: admin123<br />Last Login: 2018-05-03 11:37:24</p>
            </div>


        </div>
    </div>
</div>
<!-- navbar end here -->
<!-- crumbs -->
<div id="crumbs">
    <div class="container">
        <div class="row grid_24 clearfix">
            <div class="col grid_16"> <i class="icon-th"></i> <a href="http://localhost/sagicorconvention/admin/CPanel">Dashboard</a> <i class="icon-angle-right"></i>

                <i class="icon-group"></i> Dashboard     </div>
            <div class="col grid_8 nav-extra">
                <p class="flright">
                    <a href="http://localhost/sagicorconvention/admin/profile/edit"><i class="icon-user"></i> Profile</a>
                    <a href="http://localhost/sagicorconvention/login/logout"><i class="icon-off"></i> Sign Out</a> </p>
            </div>
        </div>
    </div>
</div>
<!-- crumbs end  -->

<div class="container">

    <div class="topheader">

        <nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">

            <div class="cbp-hsinner">

                <ul class="cbp-hsmenu">

                    <li><a title="User Management"><i class="icon-list"></i> User Management</a>

                        <ul class="cbp-hssubmenu">

                            <li><a href="http://localhost/sagicorconvention/admin/Users" title="User Management"><i class="icon-list"></i> Manage Users</a></li>

                            <li><a href="http://localhost/sagicorconvention/admin/Registration/reg_list" title="Registration Manager"><i class="icon-list"></i><span>Registration Manager</span></a></li>

                            <li><a href="http://localhost/sagicorconvention/admin/Users/verfication" title="User List"><i class="icon-list"></i><span>Send Verfication Email</span></a></li>

                        </ul>

                    </li>

                    <li><a title="Reports"><i class="icon-folder"></i> Reports</a>

                        <ul class="cbp-hssubmenu">

                            <li><a href="http://localhost/sagicorconvention/admin/Reports" title="Full Reports"><i class="icon-list"></i><span>Full Reports</span></a></li>

                            <li><a href="http://localhost/sagicorconvention/admin/Reports/saved" title="Saved Reports"><i class="icon-list"></i><span>Saved Reports</span></a></li>

                        </ul>

                    </li>

                    <li><a href="http://localhost/sagicorconvention/admin/Flights" title="Flights & Accommodation"><i class="icon-file-text"></i><span> Flights &amp; Accommodation</span></a></li>

                    <li><a href="http://localhost/sagicorconvention/admin/Templates" title="Email Templates"><i class="icon-file-text"></i><span> Email Templates</span></a></li>

                    <!--<li><a href="#" title="Newsletter"><i class="icon-envelope"></i> Newsletter</a></li>-->

                    <li><a title="Configuration"><i class="icon-cog"></i> Configuration</a>

                        <ul class="cbp-hssubmenu">

                            <li><a href="http://localhost/sagicorconvention/admin/Configuration/system" title="Site Configuration"><i class="icon-cog"></i><span>Site Configuration</span></a></li>

                            <li><a href="http://localhost/sagicorconvention/admin/Configuration/backup" title="Database Backup/Restore"><i class="icon-hdd"></i><span>Database Backup/Restore</span></a></li>

                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

    </div>



    <div id="msgholder"></div>


    <div id="message-box">

    </div><!-- message-box -->
    <div class="wrap clearfix">

        <div id="content-wrap">

            <div id="content">

                <div id="msgholder"></div>




                <script src="http://localhost/sagicorconvention/assets/admin/js/flot/jquery.flot.min.js" type="text/javascript"></script>

                <script src="http://localhost/sagicorconvention/assets/admin/js/flot/jquery.flot.resize.min.js" type="text/javascript"></script>

                <script src="http://localhost/sagicorconvention/assets/admin/js/flot/excanvas.min.js" type="text/javascript"></script>

                <p class="greentip"><i class="icon-lightbulb icon-3x pull-left"></i>Here you can view your latest user statistics.<br>

                    such as number of registered, banned and pending users</p>

                <div class="row grid_24">

                    <div class="col grid_6">

                        <div class="pagetip stats"><i class="icon-user"></i>

                            <div class="pull-right"> Registered Users<br>

                                <b class="pull-right">1</b> <br>

                            </div>

                        </div>

                    </div>

                    <div class="col grid_6">

                        <div class="pagetip stats"><i class="icon-ok-sign"></i>

                            <div class="pull-right"> Active Users <br>

                                <b class="pull-right">1</b> <br>

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

                <section class="widget">

                    <header>

                        <div class="row">

                            <h1><i class="icon-bar-chart"></i> User Statistics</h1>

                            <aside>

                                <ul class="settingsnav">

                                    <li> <a class="minilist hint--left hint--add hint--always hint--rounded" data-hint="Actions" href="#"><span class="icon-reorder"></span></a>

                                        <div id="settingslist2">

                                            <ul class="sub">

                                                <li><i class="icon-calendar pull-left"></i> <a data-type="day" href="javascript:void(0);">Today</a></li>

                                                <li><i class="icon-calendar pull-left"></i> <a data-type="week" href="javascript:void(0);">This Week</a></li>

                                                <li><i class="icon-calendar pull-left"></i> <a data-type="month" href="javascript:void(0);">This Month</a></li>

                                                <li><i class="icon-calendar pull-left"></i> <a data-type="year" href="javascript:void(0);">This Year</a></li>

                                            </ul>

                                        </div>

                                    </li>

                                </ul>

                            </aside>

                        </div>

                    </header>

                    <div class="content2">

                        <!-- Start Chart -->

                        <div class="box">

                            <div style="height: 300px; padding: 0px; position: relative;" id="chart"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198px; height: 300px;" width="1198" height="300"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 38px; top: 278px; left: 19px; text-align: center;" class="flot-tick-label tickLabel">1</div><div style="position: absolute; max-width: 38px; top: 278px; left: 58px; text-align: center;" class="flot-tick-label tickLabel">2</div><div style="position: absolute; max-width: 38px; top: 278px; left: 97px; text-align: center;" class="flot-tick-label tickLabel">3</div><div style="position: absolute; max-width: 38px; top: 278px; left: 136px; text-align: center;" class="flot-tick-label tickLabel">4</div><div style="position: absolute; max-width: 38px; top: 278px; left: 175px; text-align: center;" class="flot-tick-label tickLabel">5</div><div style="position: absolute; max-width: 38px; top: 278px; left: 214px; text-align: center;" class="flot-tick-label tickLabel">6</div><div style="position: absolute; max-width: 38px; top: 278px; left: 253px; text-align: center;" class="flot-tick-label tickLabel">7</div><div style="position: absolute; max-width: 38px; top: 278px; left: 292px; text-align: center;" class="flot-tick-label tickLabel">8</div><div style="position: absolute; max-width: 38px; top: 278px; left: 330px; text-align: center;" class="flot-tick-label tickLabel">9</div><div style="position: absolute; max-width: 38px; top: 278px; left: 366px; text-align: center;" class="flot-tick-label tickLabel">10</div><div style="position: absolute; max-width: 38px; top: 278px; left: 405px; text-align: center;" class="flot-tick-label tickLabel">11</div><div style="position: absolute; max-width: 38px; top: 278px; left: 444px; text-align: center;" class="flot-tick-label tickLabel">12</div><div style="position: absolute; max-width: 38px; top: 278px; left: 483px; text-align: center;" class="flot-tick-label tickLabel">13</div><div style="position: absolute; max-width: 38px; top: 278px; left: 522px; text-align: center;" class="flot-tick-label tickLabel">14</div><div style="position: absolute; max-width: 38px; top: 278px; left: 561px; text-align: center;" class="flot-tick-label tickLabel">15</div><div style="position: absolute; max-width: 38px; top: 278px; left: 600px; text-align: center;" class="flot-tick-label tickLabel">16</div><div style="position: absolute; max-width: 38px; top: 278px; left: 639px; text-align: center;" class="flot-tick-label tickLabel">17</div><div style="position: absolute; max-width: 38px; top: 278px; left: 678px; text-align: center;" class="flot-tick-label tickLabel">18</div><div style="position: absolute; max-width: 38px; top: 278px; left: 717px; text-align: center;" class="flot-tick-label tickLabel">19</div><div style="position: absolute; max-width: 38px; top: 278px; left: 755px; text-align: center;" class="flot-tick-label tickLabel">20</div><div style="position: absolute; max-width: 38px; top: 278px; left: 795px; text-align: center;" class="flot-tick-label tickLabel">21</div><div style="position: absolute; max-width: 38px; top: 278px; left: 834px; text-align: center;" class="flot-tick-label tickLabel">22</div><div style="position: absolute; max-width: 38px; top: 278px; left: 873px; text-align: center;" class="flot-tick-label tickLabel">23</div><div style="position: absolute; max-width: 38px; top: 278px; left: 911px; text-align: center;" class="flot-tick-label tickLabel">24</div><div style="position: absolute; max-width: 38px; top: 278px; left: 950px; text-align: center;" class="flot-tick-label tickLabel">25</div><div style="position: absolute; max-width: 38px; top: 278px; left: 989px; text-align: center;" class="flot-tick-label tickLabel">26</div><div style="position: absolute; max-width: 38px; top: 278px; left: 1028px; text-align: center;" class="flot-tick-label tickLabel">27</div><div style="position: absolute; max-width: 38px; top: 278px; left: 1067px; text-align: center;" class="flot-tick-label tickLabel">28</div><div style="position: absolute; max-width: 38px; top: 278px; left: 1106px; text-align: center;" class="flot-tick-label tickLabel">29</div><div style="position: absolute; max-width: 38px; top: 278px; left: 1145px; text-align: center;" class="flot-tick-label tickLabel">30</div><div style="position: absolute; max-width: 38px; top: 278px; left: 1184px; text-align: center;" class="flot-tick-label tickLabel">31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 263px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">0.0</div><div style="position: absolute; top: 225px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">0.5</div><div style="position: absolute; top: 188px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">1.0</div><div style="position: absolute; top: 150px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">1.5</div><div style="position: absolute; top: 113px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">2.0</div><div style="position: absolute; top: 75px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">2.5</div><div style="position: absolute; top: 38px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">3.0</div><div style="position: absolute; top: 0px; left: 2px; text-align: right;" class="flot-tick-label tickLabel">3.5</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198px; height: 300px;" width="1198" height="300"></canvas><div class="legend"><div style="position: absolute; width: 94px; height: 20px; top: 15px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:15px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel">&nbsp;&nbsp;User Statistics</td></tr></tbody></table></div></div>

                        </div>

                        <!-- End Chart /-->

                        <hr>

                        <!-- Start Revenue List-->



                        <table class="myTable" style="display: table;">

                            <thead>

                            <tr class="odd">

                                <th class="header">Month / Year</th>

                                <th class="header">#Users</th>

                            </tr>

                            </thead>


                            <tbody>
                            <tr>
                                <td>May / 2018</td><td>1</td></td>
                                <td><strong><i class="icon-calendar"></i> Total Year</strong></td>
                                <td><strong><i class="icon-refresh"></i> 1</strong></td>
                            </tr>
                            </tbody>

                        </table>

                        <!-- End Revenue List-->


                    </div>

                </section>


                <script type="text/javascript">

                    // &lt;![CDATA[

                    function getChart(range) {

                        $.ajax({

                            type: 'GET',

                            url: 'http://localhost/sagicorconvention/admin/CPanel/get_saleStats',

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

    </div></div><!-- container /-->


<div class="top20">&nbsp;</div>
<!-- Start Footer-->
<div class="footer clearfix">
    Copyright 2018 | Barcelona Administration Panel<br />sunlinc.net &bull; Administration Panel
</div>
<!-- End Footer-->
<script type="text/javascript">
    var menu = new cbpHorizontalSlideOutMenu(document.getElementById('cbp-hsmenu-wrapper'));
</script>
</body>
</html>