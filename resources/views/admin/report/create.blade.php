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
            <button type="button" class="btn btn-primary btn-sm" ><i class="fa-file-excel-o"></i> Export </button>
            <button type="button" class="btn btn-success btn-sm save-default" ><i class="fa fa-save"></i> Save As Default Checkboxes </button>
          </div>
        </div>
        <div class="box-body">
            <form class="row report-checkboxes-form" action="{{ url('admin/report/defaultCheckboxes') }}" method="POST">
                {{ csrf_field() }}          
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="col-xs-12 checkboxes">
                  <h3>Personal Information</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="comp_name" class="flat-red" checked>
                      Company Name </label><br>
                    <label><input type="checkbox" name="fname" class="flat-red" checked>
                      Contact First Name </label><br>
                    <label><input type="checkbox" name="lname" class="flat-red" checked>
                      Contact Last Name </label><br>
                    <label><input type="checkbox" name="tel" class="flat-red" checked>
                      Telephone </label><br>
                    <label><input type="checkbox" name="cell" class="flat-red" checked>
                      Cell Phone </label><br>
                    <label><input type="checkbox" name="email" class="flat-red" checked>
                      Email </label><br>
                    <label><input type="checkbox" name="email_alt" class="flat-red" checked>
                      Second Email </label><br>
                    <label><input type="checkbox" name="address" class="flat-red" checked>
                      Address </label><br>
                    <label><input type="checkbox" name="city" class="flat-red" checked>
                      City </label><br>
                    <label><input type="checkbox" name="state" class="flat-red" checked>
                      State/Province/Region </label><br>
                    <label><input type="checkbox" name="zip" class="flat-red" checked>
                      Zip/Postal Code </label><br>
                    <label><input type="checkbox" name="country" class="flat-red" checked>
                      Country </label><br>
                    <label><input type="checkbox" name="emerg_contact" class="flat-red" checked>
                      Emergency Contact </label><br>
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                      Emergency Contact's Phone Number </label><br>
                  </div>
                </div>
                <div class="col-xs-12 checkboxes">
                  <h3>Preferences</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="preference" class="flat-red" checked>
                      Prefrences </label><br>
                    <label><input type="checkbox" name="special_need" class="flat-red" checked>
                      Special Needs or Dietary/Physical Restrictions </label><br>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="col-xs-12 checkboxes">
                  <h3>Guests</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                      First Name </label><br>
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                     Badge First Name </label><br>
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                     Middle Name </label><br>
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                     Last Name </label><br>
                    <label><input type="checkbox" name="emerg_phone" class="flat-red" checked>
                     T-shirt size </label><br>
                  </div>
                </div>
                <div class="col-xs-12 checkboxes">
                  <h3>Additional Attendees</h3>
                  <div class="form-group">
                    <label><input type="checkbox" name="attendee_date_id" class="flat-red" checked>
                      Additional Attendees for Program Dates </label><br>
                  </div>
                </div>
                <div class="col-xs-12 checkboxes">
                  <h3>Meeting</h3>
                  <div class="form-group">
                    <label><input type="checkbox" name="meeting_participants" class="flat-red" checked>
                      Peoples Attending Meeting </label><br>
                  </div>
                </div>
                <div class="col-xs-12 checkboxes">
                  <h3>Hotel</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="extend_trip" class="flat-red" checked>
                      Extend Trip </label><br>
                    <label><input type="checkbox" name="european_dealer" class="flat-red" checked>
                      European Dealer </label><br>
                    <label><input type="checkbox" name="arrival_date_id" class="flat-red" checked>
                      Arrive Date</label><br>
                    <label><input type="checkbox" name="departure_date_id" class="flat-red" checked>
                      Departure Date </label><br>
                    <label><input type="checkbox" name="attende_ext_night_id" class="flat-red" checked>
                      Attendees for Extended Nights </label><br>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="col-xs-12 checkboxes">
                  <h3>Flights</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="airfare_quote" class="flat-red" checked>
                     Airfare Quote </label><br>
                    <label><input type="checkbox" name="service_class" class="flat-red" checked>
                      Class of Service </label><br>
                    <label><input type="checkbox" name="dpt_city" class="flat-red" checked>
                      Departure City</label><br>
                    <label><input type="checkbox" name="dpt_date" class="flat-red" checked>
                      Departure Date </label><br>
                    <label><input type="checkbox" name="pref_dpt_time" class="flat-red" checked>
                      Preferred Departure Time </label><br>
                    <label><input type="checkbox" name="ret_date" class="flat-red" checked>
                      Return Date </label><br>
                    <label><input type="checkbox" name="pref_ret_time" class="flat-red" checked>
                      Preferred Return Time </label><br>
                    <label><input type="checkbox" name="pref_airline" class="flat-red" checked>
                      Preferred Airline </label><br>
                    <label><input type="checkbox" name="freq_flyer_no" class="flat-red" checked>
                      Frequent Flyer </label><br>
                    <label><input type="checkbox" name="payment_method" class="flat-red" checked>
                      Payment Method  </label><br>
                    <label><input type="checkbox" name="special_notes" class="flat-red" checked>
                      Special Notes </label><br>
                  </div>
                </div>
                <div class="col-xs-12 checkboxes">
                  <h3>Agreement</h3>
                  <label><input type="checkbox" name="select_all" class="flat-red" checked>
                      Select All</label>
                  <div class="form-group col-xs-12">
                    <label><input type="checkbox" name="send_invoice" class="flat-red" checked>
                      Agree To Pay Charges </label><br>
                    <label><input type="checkbox" name="special_circumstances" class="flat-red" checked>
                      Special Circumstances or Notes </label><br>
                    <label><input type="checkbox" name="save_info" class="flat-red" checked>
                      Save Info </label><br>
                  </div>
                </div>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>

    $(document).on('click','input[name="select_all"]', function(e){
      if(!$(this).is(':checked')){
        $(this).parents('.checkboxes').find('input').prop('checked',false);
      } else {
        $(this).parents('.checkboxes').find('input').prop('checked',true);
      }
    })
    $(document).on('click','.save-default', function(e){
      $('.report-checkboxes-form').submit();
    })
    $(document).on('submit','.report-checkboxes-form', function(e){
      e.preventDefault();
      var form=$(this);
      $.ajax({
        type: "POST",
        url: form.attr( 'action' ),
        // data: form.serialize(),
        data:  new FormData(this),
        contentType: false,
        cache: false, 
        processData:false,
        beforeSend:function(){
        },
        success: function( data ) {
          console.log(data);
        },
        error:function(){

        }
    });
  });
  </script>
@endsection