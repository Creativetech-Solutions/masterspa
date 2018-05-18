@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Registration Reports
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Full Report</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Export Or Save Report</h3>

                    <div class="box-tools pull-right">
                       {{-- <button type="button" class="btn btn-primary btn-sm selected-checkbox-save"
                                onclick="fileName()">
                            <i
                                    class="fa fa-save"></i> Save Report
                        </button>--}}
                        <button type="button" class="btn btn-primary btn-sm " id="exportReport">
                            <i
                                    class="fa fa-file-excel-o" ></i> Export
                        </button>
                        <button type="button" class="btn btn-success btn-sm save-default"><i class="fa fa-save"></i>
                            Save As Default Checkboxes
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <form class="row report-checkboxes-form" action="" method="POST">
                        {{ csrf_field() }}
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="col-xs-12 checkboxes">
                                <h3>Personal Information</h3>
                                <label><input type="checkbox" class="select_all flat-red">
                                    Select All</label>
                                <input type="hidden" name="file_name" value="">
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___comp_name::Company"
                                                  {{ (in_array('r___comp_name::Company', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Company Name </label><br>
                                    <label><input type="checkbox" name="r___fname::First_Name"
                                                  {{ (in_array('r___fname::First_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Contact First Name </label><br>
                                    <label><input type="checkbox" name="r___lname::Last_Name"
                                                  {{ (in_array('r___lname::Last_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Contact Last Name </label><br>
                                    <label><input type="checkbox" name="r___tel::Telephone"
                                                  {{ (in_array('r___tel::Telephone', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Telephone </label><br>
                                    <label><input type="checkbox" name="r___cell::Cell"
                                                  {{ (in_array('r___cell::Cell', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Cell Phone </label><br>
                                    <label><input type="checkbox" name="r___email::Email"
                                                  {{ (in_array('r___email::Email', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Email </label><br>
                                    <label><input type="checkbox" name="r___email_alt::Alt_Email"
                                                  {{ (in_array('r___email_alt::Alt_Email', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Second Email </label><br>
                                    <label><input type="checkbox" name="r___address::Address"
                                                  {{ (in_array('r___address::Address', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Address </label><br>
                                    <label><input type="checkbox" name="r___city::City"
                                                  {{ (in_array('r___city::City', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        City </label><br>
                                    <label><input type="checkbox" name="r___state::State"
                                                  {{ (in_array('r___state::State', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        State/Province/Region </label><br>
                                    <label><input type="checkbox" name="r___zip::Zip"
                                                  {{ (in_array('r___zip::Zip', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Zip/Postal Code </label><br>
                                    <label><input type="checkbox" name="r___country::Country"
                                                  {{ (in_array('r___country::Country', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Country </label><br>
                                    <label><input type="checkbox" name="r___emerg_contact::Emergency_Contact"
                                                  {{ (in_array('r___emerg_contact::Emergency_Contact', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Emergency Contact </label><br>
                                    <label><input type="checkbox" name="r___emerg_phone::Emergency_Phone"
                                                  {{ (in_array('r___emerg_phone::Emergency_Phone', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Emergency Contact's Phone Number </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Preferences</h3>
                                <label><input type="checkbox" class="select_all flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___preference::Perference"
                                                  {{ (in_array('r___preference::Perference', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Prefrences </label><br>
                                    <label><input type="checkbox" name="r___special_need::Special_Need"
                                                  {{ (in_array('r___special_need::Special_Need', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Needs or Dietary/Physical Restrictions </label><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="col-xs-12 checkboxes">
                                <h3>Guests</h3>
                                <label><input type="checkbox" class="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___num_of_travlers::Num_of_Travlers"
                                                  {{ (in_array('r___num_of_travlers::Num_of_Travlers', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Number of Travelers </label><br>
                                    <label><input type="checkbox" name="g___fname::Guest_First_Name"
                                                  {{ (in_array('g___fname::Guest_First_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        First Name </label><br>
                                    <label><input type="checkbox" name="g___badge_fname::Guest_Badge_Name"
                                                  {{ (in_array('g___badge_fname::Guest_Badge_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Badge First Name </label><br>
                                    <label><input type="checkbox" name="g___middle_fname::Guest_Middle_Name"
                                                  {{ (in_array('g___middle_fname::Guest_Middle_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Middle Name </label><br>
                                    <label><input type="checkbox" name="g___lname::Guest_Last_Name"
                                                  {{ (in_array('g___lname::Guest_Last_Name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Last Name </label><br>
                                    <label><input type="checkbox" name="g___age::Age"
                                                  {{ (in_array('g___age::Age', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Age </label><br>
                                    <label><input type="checkbox" name="g___tshirt_size::Guest_Shirt_Size"
                                                  {{ (in_array('g___tshirt_size::Guest_Shirt_Size', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        T-shirt size </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Additional Attendees</h3>
                                <div class="form-group">
                                    <label><input type="checkbox" name="r___attendee_date_id::Attendee_Date"
                                                  {{ (in_array('r___attendee_date_id::Attendee_Date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Additional Attendees for Program Dates </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Meeting</h3>
                                <div class="form-group">
                                    <label><input type="checkbox" name="r___meeting_participants::Meeting_Participants"
                                                  {{ (in_array('r___meeting_participants::Meeting_Participants', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Peoples Attending Meeting </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Hotel</h3>
                                <label><input type="checkbox" class="select_all flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___extend_trip::Extend_Trip"
                                                  {{ (in_array('r___extend_trip::Extend_Trip', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Extend Trip </label><br>
                                    <label><input type="checkbox" name="r___european_dealer::European_Dealer"
                                                  {{ (in_array('r___european_dealer::European_Dealer', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        European Dealer </label><br>
                                    <label><input type="checkbox" name="r___arrival_date_id::Arrival_Date"
                                                  {{ (in_array('r___arrival_date_id::Arrival_Date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Arrive Date</label><br>
                                    <label><input type="checkbox" name="r___departure_date_id::Hotel_Dpt_Date"
                                                  {{ (in_array('r___departure_date_id::Hotel_Dpt_Date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure Date </label><br>
                                    <label><input type="checkbox" name="r___attende_ext_night_id::Attendee_Extra_Nights"
                                                  {{ (in_array('r___attende_ext_night_id::Attendee_Extra_Nights', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Attendees for Extended Nights </label><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="col-xs-12 checkboxes">
                                <h3>Flights</h3>
                                <label><input type="checkbox" class="select_all flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___airfare_quote::Airfare_Quote"
                                                  {{ (in_array('r___airfare_quote::Airfare_Quote', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Airfare Quote </label><br>
                                    <label><input type="checkbox" name="r___service_class::Service_Class"
                                                  {{ (in_array('r___service_class::Service_Class', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Class of Service </label><br>
                                    <label><input type="checkbox" name="r___dpt_city::Dept_City"
                                                  {{ (in_array('r___dpt_city::Dept_City', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure City</label><br>
                                    <label><input type="checkbox" name="r___dpt_date::Dept_Date"
                                                  {{ (in_array('r___dpt_date::Dept_Date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure Date </label><br>
                                    <label><input type="checkbox" name="r___pref_dpt_time::Pref_Dpt_Time"
                                                  {{ (in_array('r___pref_dpt_time::Pref_Dpt_Time', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Departure Time </label><br>
                                    <label><input type="checkbox" name="r___ret_date::Ret_Date"
                                                  {{ (in_array('r___ret_date::Ret_Date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Return Date </label><br>
                                    <label><input type="checkbox" name="r___pref_ret_time::Pref_Ret_Time"
                                                  {{ (in_array('r___pref_ret_time::Pref_Ret_Time', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Return Time </label><br>
                                    <label><input type="checkbox" name="r___pref_airline::Pref_Airline"
                                                  {{ (in_array('r___pref_airline::Pref_Airline', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Airline </label><br>
                                    <label><input type="checkbox" name="r___freq_flyer_no::Freq_Flyer_No"
                                                  {{ (in_array('r___freq_flyer_no::Freq_Flyer_No', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Frequent Flyer </label><br>
                                    <label><input type="checkbox" name="r___payment_method::Payment_Method"
                                                  {{ (in_array('r___payment_method::Payment_Method', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Payment Method </label><br>
                                    <label><input type="checkbox" name="r___special_notes::Special_Notes"
                                                  {{ (in_array('r___special_notes::Special_Notes', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Notes </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Agreement</h3>
                                <label><input type="checkbox" class="select_all flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="r___send_invoice::Send_Invoice"
                                                  {{ (in_array('r___send_invoice::Send_Invoice', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Agree To Pay Charges </label><br>
                                    <label><input type="checkbox"
                                                  name="r___special_circumstances::Special_Circumstances"
                                                  {{ (in_array('r___special_circumstances::Special_Circumstances', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Circumstances or Notes </label><br>
                                    <label><input type="checkbox" name="r___save_info::Save_Info"
                                                  {{ (in_array('r___save_info::Save_Info', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Save Info </label><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            {{--<div class="box-footer">
              Footer
            </div>--}}
            <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>

        $(document).on('click', '.select_all', function (e) {
            if (!$(this).is(':checked')) {
                $(this).parents('.checkboxes').find('input').prop('checked', false);
            } else {
                $(this).parents('.checkboxes').find('input').prop('checked', true);
            }
        })

        $(document).on('click', '.save-default', function (e) {
            $('form').attr('action', '{{ url('admin/report/defaultCheckboxes') }}');
            if (!$('form').hasClass('report-checkboxes-form'))
                $('form').addClass('report-checkboxes-form');
            $('.report-checkboxes-form').submit();
        })
        /*$(document).on('click', '.selected-checkbox-save', function (e) {
            var $ref = $('form');
            $ref.attr('action', '');
            if ($ref.hasClass('report-checkboxes-form'))
                $ref.removeClass('report-checkboxes-form');
            $ref.submit();
        })
        $(document).on('click', '.selected-checkbox', function (e) {
            var $ref = $('form');
            $ref.attr('action', '');
            $ref.removeClass('report-checkboxes-form');
            $ref.submit();
        })*/
        $(document).on('submit', '.report-checkboxes-form', function (e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                // data: form.serialize(),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                },
                success: function (data) {
                    console.log(data);
                },
                error: function () {

                }
            });
        });

        $("#exportReport").on("click",function(){
            var text = "<i class=\"icon-info-sign icon-3x pul   l-left\"></i>Do you want to save the generated Report?<br /> ";
            new Messi(text, {
                title: "Generate Report",
                modal: true,
                closeButton: true,
                buttons: [{
                    id: 0,
                    label: "Save Report",
                    val: 'Y'
                },{
                    id: 1,
                    label: "Generate Report(Default)",
                    val: 'D'
                },{
                    id: 2,
                    label: "Generate Only(Single)",
                    val: 'S'
                }],
                callback: function (val) {
                    //We Also Need to Save the Report
                    var reportName = "";
                    reportName = prompt("Specify Name For Report","Report.xls");
                    if (reportName == null) {
                        reportName = "Report";
                        $("input[type=hidden][name=file_name]").val(reportName);
                    } else {
                        $("input[type=hidden][name=file_name]").val(reportName);
                    }
                    if(val == 'D')
                    {
                        var $ref = $('form');
                        $ref.attr('action', '{{url('admin/report/defaultreport')}}');
                        $ref.removeClass('report-checkboxes-form');
                        $ref.submit();
                    }else if(val == 'Y')
                    {
                        var $ref = $('form');
                        $ref.attr('action', '{{url('admin/report/defaultCheckboxesAndSave')}}');
                        if ($ref.hasClass('report-checkboxes-form'))
                            $ref.removeClass('report-checkboxes-form');
                        $ref.submit();
                    } else if (val == 'S')
                    {
                        var $ref = $('form');
                        $ref.attr('action', '{{url('admin/report/singleReport')}}');
                        $ref.removeClass('report-checkboxes-form');
                        $ref.submit();
                    }
                }
            });
        });

        // remove popup on click outside
        $(document).mouseup(function(e) 
        {
            var container = $(".messi");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                $('.messi-modal, .messi').remove();
            }
        });
    </script>
@endsection