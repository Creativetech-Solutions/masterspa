@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Guests
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="#">Edit Guests Flights</a></li>
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
                    <div class="heading">
                        <h3 class="page-title-container">Edit Guests Flights</h3>
                    </div>
                    <div class="row">
                        <form action="{{url('admin/guests/edit_guest_flight/'.$f_data->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrival Flight:</label>
                                    <input type="text" class="form-control" name="arrival_flight"
                                           value="{{ $f_data->arrival_flight }}"
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Arrival time:</label>
                                    <input type="text" class="form-control" name="arrival_time"
                                           value="{{ $f_data->arrival_time }}"
                                           style="width: 100%;"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure Flight:</label>
                                    <input type="text" class="form-control" name="departure_flight"
                                           value="{{ $f_data->departure_flight }}"
                                           style="width: 100%;"/>
                                </div>
                                <div class="form-group">
                                    <label>Departure Time:</label>
                                    <input type="text" class="form-control" name="departure_time"
                                           value="{{ $f_data->departure_time }}"
                                           style="width: 100%;"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datetimepicker({
                format: 'L'

            });
        });
    </script>
@endsection