@extends('admin.layouts.app')
@section('content')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Guests Listing
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/user')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Guests</li>
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
                                    <th>Id</th>
                                    <th>Req Id</th>
                                    <th>First Name</th>
                                    <th>Badge Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>T-shirt Size</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guests as $key=>$guest)
                                    <tr>
                                        <td>{{$guest->id}}</td>
                                        <td>{{$guest->register_id}}</td>
                                        <td>{{$guest->fname}}</td>
                                        <td>{{$guest->badge_fname}}</td>
                                        <td>{{$guest->middle_fname}}</td>
                                        <td>{{$guest->lname}}</td>
                                        <td>{{$guest->tshirt_size}}</td>
                                        <td><a  href="{{url('admin/guests/edit_guest/'.$guest->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Req Id</th>
                                    <th>First Name</th>
                                    <th>Badge Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>T-shirt Size</th>
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

