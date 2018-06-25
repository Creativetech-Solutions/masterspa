@extends('admin.layouts.app')
@section('content')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration Listing
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="reglist" class="table data-table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Reg Id</th>
                  <th>Company</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Lock</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registrations as $key=>$reg)
                <tr>
                  <td>{{$reg->id}}</td>
                  <td>{{$reg->comp_name}} 
                  <a class="pull-right label label-xs label-info" href="{{url('admin/guests/'.$reg->id)}}">
                  {{$reg->num_of_travlers == "" ? 0 : $reg->num_of_travlers}} Guests
                  </a>

                  </td>
                  <td>{{$reg->fname}}</td>
                  <td>{{$reg->lname}}</td>
                  <td>{{$reg->email}}</td>
                    <td><input type="checkbox" id="block" class="checkbox lock" data-id="{{$reg->id}}"></td>
                  <td>
                  <a title="Edit" href="{{url('admin/registration/edit_form/'.$reg->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                  <a title="Delete" href="{{url('admin/registration/delete/'.$reg->id)}}" class="btn btn-xs btn-danger delete-reservation"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Reg Id</th>
                  <th>Title</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Lock</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<!-- page script -->

<script>
  $(document).on('click','.delete-reservation', function(e){
    e.preventDefault();
    var $ref = $(this);
    $.ajax({
      url:$ref.attr('href'),
      success:function(e){
        $ref.parents('tr').remove();
        notify('success','Record Successfully Deleted');
      }
    });
  })
  $("#block").change(function () {
      var regID = $(this).attr('data-id');
      $.ajax({
          type: "POST",
          url: "{{url('admin/registration/lock')}}"/+regID,
          async: true,
          success: function (msg) {
              alert('Success');
              notify('success','Record Successfully Locked');
              if (msg != 'success') {
                  notify('locked','Record Successfully Unlocked');
              }
          }
      });
  });
</script>
@endsection

