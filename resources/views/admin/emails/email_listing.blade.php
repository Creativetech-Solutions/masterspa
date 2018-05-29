@extends('admin.layouts.app')
@section('content')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/admin')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                            <table id="reglist" class="table data-table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Help</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $key=>$email)
                                    <tr>
                                        <td>{{$email->id}}</td>
                                        <td>{{$email->name}}</td>
                                        <td>{{$email->subject}}</td>
                                        <td>{{$email->help}}</td>
                                        <td><a href="{{url('admin/emails/edit_template/'.$email->id)}}" data-id="{{$email->id}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Help</th>
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
        $(".exportReport").on("click",function(){
            var reportId = $(this).attr('data-id');
            var text = "<i class=\"icon-info-sign icon-3x pul   l-left\"></i>Please Select Report Type<br /> ";
            new Messi(text, {
                title: "Download Report",
                modal: true,
                closeButton: true,
                buttons: [{
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
                    if(val == 'D')
                        location.assign('{{url("admin/report/download_default")}}/'+reportId);
                    else if(val == 'S')
                        location.assign('{{url("admin/report/download_single/")}}/'+reportId);

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

