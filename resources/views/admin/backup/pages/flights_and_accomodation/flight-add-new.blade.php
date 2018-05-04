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

                <i class="icon-group"></i> Flights & Accommodation     </div>
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

                <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i>You can add flight and accommodation details on this panel<br>&nbsp;</p>
                <section class="widget">
                    <header>
                        <div class="row">
                            <h1><i class="icon-reorder"></i> Flights &amp; Accommodation <button hidden="">Export report</button></h1>
                        </div>
                    </header>
                    <div class="content2">
                        <div class="row">
                            <div class="ptop30">
                                <form class="xform" id="dForm" method="post" style="padding:0;">
                                    <section class="col col-6">
                                        <select name="select" id="userfilter">
                                            <option value="NA">--- Reset Flight Filter ---</option>
                                        </select>
                                    </section>
                                    <div class="hr2"></div>
                                    <section class="col col-4">
                                        <label class="input"> <i class="icon-prepend icon-search"></i>
                                            <input type="text" name="serachflight"  id="search-input" placeholder="Search Flights">
                                        </label>
                                        <div id="suggestions"></div>
                                    </section>

                                    <section class="col col-2">
                                        <button class="button inline" name="find" type="submit">Find<span><i class="icon-chevron-right"></i></span></button>
                                    </section>
                                </form>
                            </div>
                        </div>
                        <table id="flights" class="myTable" style="display: table;">
                            <thead>
                            <tr>
                                <th width="header" class="left header">Reg ID</th>
                                <th class="header">Title</th>
                                <th class="header">First Name</th>
                                <th class="header">Last Name</th>
                                <th class="header">Name Badge</th>

                                <th class="header">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd">
                                <td>001a</td>
                                <td>Mrs</td>
                                <td>Amanda</td>
                                <td>Abraham</td>
                                <td>Amanda</td>

                                <td><span class="tbicon"> <a data-title="View Flights &amp; Accommodation" class="tooltip" href="index.php?do=flight-info&amp;id=13&amp;regno=001a"><i class="icon-pencil"></i></a> </span></td>
                            </tr>
                            </tbody></table>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://localhost/sagicorconvention/assets/vendor/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://localhost/sagicorconvention/assets/admin/js/customScripting.js"></script>
    <script type="text/javascript">
        $(function () {
            //// Need To Work ON New Way Of DataTables..
            oTable ="";
            //Initialize Select2 Elements
            var flightsListTable = $("#flights");
            var url_DT = "http://localhost/sagicorconvention/admin/flights/get_registered_users";
            var aoColumns_DT = [
                /* User ID RegID*/ {
                    "mData": "RegID",
                    "bVisible": true,
                    "bSortable": true,
                    "bSearchable": true
                },
                /* Username  */ {
                    "mData" : "Title"
                },
                /* Full Name */ {
                    "mData" : "FirstName"
                },
                /* User Status */ {
                    "mData" : "LastName"
                },
                /*  User Level */ {
                    "mData" : "NameBadge"
                },
                /* Last User Login */ {
                    "mData": "actionButtons"
                }
            ];
            var HiddenColumnID_DT = "ID";
            var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
            commonDataTables(flightsListTable,url_DT,aoColumns_DT,sDom_DT,HiddenColumnID_DT);

            //Code for search box
            $("#search-input").on("keyup",function (e) {
                oTable.fnFilter( $(this).val());
            });
            /*
             //Code to Redirect to Delete User on click.
             flightsListTable.on("click",".delete",function(e){
             var uid = $(this).parents('tr').attr('data-id');
             var text = "<div><i class=\"icon-warning-sign icon-2x pull-left\"></i>Are you sure you want to delete this record?<br /><strong>This action cannot be undone!!!</strong></div>";
             new Messi(text, {
             title: "Delete User",
             modal: true,
             closeButton: true,
             buttons: [{
             id: 0,
             label: "Delete",
             val: 'Y'
             }],
             callback: function (val) {
             $.ajax({
             type: 'post',
             url: "http://localhost/sagicorconvention/admin/users/delete",
             data: {
             id: uid
             },
             cache: false,
             beforeSend: function () {
             showLoader();
             },
             success: function (msg) {
             hideLoader();
             $("#msgholder").html(msg);
             $('html, body').animate({
             scrollTop: 0
             }, 600);
             }
             });
             }
             });
             });

             //Code to Activate User on Click
             usersTableSelector.on('click','a.activate', function (e) {
             var uid = $(this).attr('id').replace('act_', '')
             var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
             new Messi(text, {
             title: "Activate User Account",
             modal: true,
             closeButton: true,
             buttons: [{
             id: 0,
             label: "Activate",
             val: 'Y'
             }],
             callback: function (val) {
             $.ajax({
             type: 'post',
             url: "http://localhost/sagicorconvention/admin/users/activate",
             data: {
             activateAccount: 1,
             id: uid,
             },
             cache: false,
             beforeSend: function () {
             showLoader();
             },
             success: function (msg) {
             hideLoader();
             $("#msgholder").html(msg);
             $('html, body').animate({
             scrollTop: 0
             }, 600);
             }
             });
             }
             });
             });*/


        });
    </script>
</div><!-- container /-->


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