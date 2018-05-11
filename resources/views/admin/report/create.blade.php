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
                        <button type="button" class="btn btn-primary btn-sm selected-checkbox"><i
                                    class="fa-file-excel-o"></i> Export
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
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="comp_name"
                                                  {{ (in_array('comp_name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Company Name </label><br>
                                    <label><input type="checkbox" name="fname"
                                                  {{ (in_array('fname', $db_checkboxes)) ? 'checked': '' }}class="flat-red">
                                        Contact First Name </label><br>
                                    <label><input type="checkbox" name="lname"
                                                  {{ (in_array('lname', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Contact Last Name </label><br>
                                    <label><input type="checkbox" name="tel"
                                                  {{ (in_array('tel', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Telephone </label><br>
                                    <label><input type="checkbox" name="cell"
                                                  {{ (in_array('cell', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Cell Phone </label><br>
                                    <label><input type="checkbox" name="email"
                                                  {{ (in_array('email', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Email </label><br>
                                    <label><input type="checkbox" name="email_alt"
                                                  {{ (in_array('email_alt', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Second Email </label><br>
                                    <label><input type="checkbox" name="address"
                                                  {{ (in_array('address', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Address </label><br>
                                    <label><input type="checkbox" name="city"
                                                  {{ (in_array('city', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        City </label><br>
                                    <label><input type="checkbox" name="state"
                                                  {{ (in_array('state', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        State/Province/Region </label><br>
                                    <label><input type="checkbox" name="zip"
                                                  {{ (in_array('zip', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Zip/Postal Code </label><br>
                                    <label><input type="checkbox" name="country"
                                                  {{ (in_array('country', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Country </label><br>
                                    <label><input type="checkbox" name="emerg_contact"
                                                  {{ (in_array('emerg_contact', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Emergency Contact </label><br>
                                    <label><input type="checkbox" name="emerg_phone"
                                                  {{ (in_array('emerg_phone', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Emergency Contact's Phone Number </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Preferences</h3>
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="preference"
                                                  {{ (in_array('preference', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Prefrences </label><br>
                                    <label><input type="checkbox" name="special_need"
                                                  {{ (in_array('special_need', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Needs or Dietary/Physical Restrictions </label><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="col-xs-12 checkboxes">
                                <h3>Guests</h3>
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="fname"
                                                  {{ (in_array('fname', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        First Name </label><br>
                                    <label><input type="checkbox" name="badge_name"
                                                  {{ (in_array('badge_name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Badge First Name </label><br>
                                    <label><input type="checkbox" name="middle_name"
                                                  {{ (in_array('middle_name', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Middle Name </label><br>
                                    <label><input type="checkbox" name="lname"
                                                  {{ (in_array('lname', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Last Name </label><br>
                                    <label><input type="checkbox" name="tshirt_size"
                                                  {{ (in_array('tshirt_size', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        T-shirt size </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Additional Attendees</h3>
                                <div class="form-group">
                                    <label><input type="checkbox" name="attendee_date_id"
                                                  {{ (in_array('attendee_date_id', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Additional Attendees for Program Dates </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Meeting</h3>
                                <div class="form-group">
                                    <label><input type="checkbox" name="meeting_participants"
                                                  {{ (in_array('meeting_participants', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Peoples Attending Meeting </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Hotel</h3>
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="extend_trip"
                                                  {{ (in_array('extend_trip', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Extend Trip </label><br>
                                    <label><input type="checkbox" name="european_dealer"
                                                  {{ (in_array('european_dealer', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        European Dealer </label><br>
                                    <label><input type="checkbox" name="arrival_date_id"
                                                  {{ (in_array('arrival_date_id', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Arrive Date</label><br>
                                    <label><input type="checkbox" name="departure_date_id"
                                                  {{ (in_array('departure_date_id', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure Date </label><br>
                                    <label><input type="checkbox" name="attende_ext_night_id"
                                                  {{ (in_array('attende_ext_night_id', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Attendees for Extended Nights </label><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="col-xs-12 checkboxes">
                                <h3>Flights</h3>
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="airfare_quote"
                                                  {{ (in_array('airfare_quote', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Airfare Quote </label><br>
                                    <label><input type="checkbox" name="service_class"
                                                  {{ (in_array('service_class', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Class of Service </label><br>
                                    <label><input type="checkbox" name="dpt_city"
                                                  {{ (in_array('dpt_city', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure City</label><br>
                                    <label><input type="checkbox" name="dpt_date"
                                                  {{ (in_array('dpt_date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Departure Date </label><br>
                                    <label><input type="checkbox" name="pref_dpt_time"
                                                  {{ (in_array('pref_dpt_time', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Departure Time </label><br>
                                    <label><input type="checkbox" name="ret_date"
                                                  {{ (in_array('ret_date', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Return Date </label><br>
                                    <label><input type="checkbox" name="pref_ret_time"
                                                  {{ (in_array('pref_ret_time', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Return Time </label><br>
                                    <label><input type="checkbox" name="pref_airline"
                                                  {{ (in_array('pref_airline', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Preferred Airline </label><br>
                                    <label><input type="checkbox" name="freq_flyer_no"
                                                  {{ (in_array('freq_flyer_no', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Frequent Flyer </label><br>
                                    <label><input type="checkbox" name="payment_method"
                                                  {{ (in_array('payment_method', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Payment Method </label><br>
                                    <label><input type="checkbox" name="special_notes"
                                                  {{ (in_array('special_notes', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Notes </label><br>
                                </div>
                            </div>
                            <div class="col-xs-12 checkboxes">
                                <h3>Agreement</h3>
                                <label><input type="checkbox" name="select_all" class="flat-red">
                                    Select All</label>
                                <div class="form-group col-xs-12">
                                    <label><input type="checkbox" name="send_invoice"
                                                  {{ (in_array('send_invoice', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Agree To Pay Charges </label><br>
                                    <label><input type="checkbox" name="special_circumstances"
                                                  {{ (in_array('special_circumstances', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
                                        Special Circumstances or Notes </label><br>
                                    <label><input type="checkbox" name="save_info"
                                                  {{ (in_array('save_info', $db_checkboxes)) ? 'checked': '' }} class="flat-red">
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

        $(document).on('click', 'input[name="select_all"]', function (e) {
            if (!$(this).is(':checked')) {
                $(this).parents('.checkboxes').find('input').prop('checked', false);
            } else {
                $(this).parents('.checkboxes').find('input').prop('checked', true);
            }
        })
        $(document).on('click', '.save-default', function (e) {
            $('form').attr('action', '{{ url('admin/report/defaultCheckboxes') }}');
            if(!$('form').hasClass('report-checkboxes-form'))
                $('form').addClass('report-checkboxes-form');
            $('.report-checkboxes-form').submit();
        })
        $(document).on('click', '.selected-checkbox', function (e) {
            var $ref = $('.report-checkboxes-form');
            $ref.attr('action', '{{url('admin/report/excel')}}');
            $ref.removeClass('report-checkboxes-form');
            $ref.submit();
        })
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
    </script>
@endsection