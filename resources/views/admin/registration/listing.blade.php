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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registrations as $key=>$reg)
                <tr>
                  <td>{{$reg->id}}</td>
                  <td>{{$reg->comp_name}}</td>
                  <td>{{$reg->fname}}</td>
                  <td>{{$reg->lname}}</td>
                  <td>{{$reg->email}}</td>
                  <td><a href="{{url('admin/registration/edit_form/'.$reg->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>
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
@endsection

