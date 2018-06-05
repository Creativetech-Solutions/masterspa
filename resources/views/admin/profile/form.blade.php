@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="#">Profile</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="{{url('admin/profile')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="user_name"
                                           value="{{$userprofile->name}}" style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$userprofile->email}}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" value=""
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Second Email</label>
                                    <input type="text" class="form-control" name="email_alt" value="{{$userprofile->email_alt}}"
                                           style="width: 100%;"/>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 row">
                                <!-- /.form-group -->
                                <div class="form-group col-md-6">
                                    <label>Created at</label>
                                    <input type="text" class="form-control" name="created_at" readonly="readonly"
                                           value="{{$userprofile->created_at}}" style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group col-md-6"><br>
                                <button type="submit"  class="btn btn-primary pull-right">Update</button>
                                </div>

                            </div>
                        </form>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection