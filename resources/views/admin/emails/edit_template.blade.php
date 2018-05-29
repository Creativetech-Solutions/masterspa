@extends('admin.layouts.app')
@section('content')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{asset('public/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class=container-page">
            <section class="content-header">
                <h1>
                    Email Template Listing
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Email Listing</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{url('admin/emails/update/'.$email_template->id)}}" id="temp_update"
                                      method="post">
                                    {{csrf_field()}}
                                    <header>Email Template Manager<span>Editing Email Template <i
                                                    class="icon-double-angle-right"></i> {{$email_template->name}}</span>
                                    </header>
                                    <div class="form-group col-xs-6">
                                        <label class="input">Template Title</label>
                                        <input type="text" class="form-control" placeholder="Template Title"
                                               value="{{$email_template->name}}" name="name">
                                        <label class="input">Email Subject</label>
                                        <input type="text" class="form-control" placeholder="Subject"
                                               value="{{$email_template->subject}}" name="subject">
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label class="input">Description</label>

                                        <textarea name="help" class="form-control">
                                            {{$email_template->help}}</textarea>
                                    </div>
                                    <div class="col-xs-12">
                                        <textarea class="form-control" name="temp"
                                                  id="summary-ckeditor">{{$email_template->body}}</textarea>
                                        <div class="label2 label-important">Do Not Replace Variables Between [ ]</div>
                                        <button type="submit" class="btn btn-primary pull-right">Update
                                            Template<span><i
                                                        class="icon-ok"></i></span></button>
                                        <a class="btn btn-danger pull-right" href="{{url('admin/emails')}}">Cancel</a>
                                    </div>
                                    <input type="hidden" value="{{$email_template->id}}" name="id">
                                </form>

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
    </div>
    <!-- ./wrapper -->
    <!-- page script -->

    <script>
        CKEDITOR.replace('summary-ckeditor');

    </script>
@endsection