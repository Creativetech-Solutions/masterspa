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
                <li class="active"><a href="#">Guests</a></li>
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
                    <div class="panel-heading">
                        <h3 class="page-title-container">Attendee</h3>
                        <div class="form-group pull-right">
                            <a type="button" href="{{url('admin/guests_flight/'.$guest->id)}}"
                               class="btn btn-default pull-right">View
                                Flights</a>
                            <button class="btn btn-primary pull-right" data-id="{{$guest->id}}" data-toggle="modal"
                                    data-target="#modalAddFlight">Add Flights
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <form action="{{url('admin/guests/edit_guest/'.$guest->id)}}" method="post">
                            {{ csrf_field() }}

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{ $guest->fname }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Badge Name:</label>
                                    <input type="text" class="form-control" name="badge_name"
                                           value="{{ $guest->badge_fname }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input type="text" class="form-control" name="middle_name"
                                           value="{{ $guest->middle_fname }}"
                                           style="width: 100%;"/>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{ $guest->lname }}"
                                           style="width: 100%;"/>
                                </div>

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Date of birth:</label>
                                    <input type="text" name="dob" class="form-control datepicker"
                                           data-date-format="YYYY-MM-DD"
                                           value="{{ $guest->age }}"/>
                                </div>
                                <div class="form-group">
                                    <label>T-shirt size:</label>
                                    <select name="gshirtsize" class="form-control">
                                        <option value="S" {{ $guest->tshirt_size == "S" ? 'selected':''}}>S</option>
                                        <option value="M" {{ $guest->tshirt_size == "M" ? 'selected':''}}>M</option>
                                        <option value="L" {{ $guest->tshirt_size == "L" ? 'selected':''}}>L</option>
                                        <option VALUE="XL" {{ $guest->tshirt_size == "XL" ? 'selected':''}}>XL</option>
                                        <option value="2XL" {{ $guest->tshirt_size == "2XL" ? 'selected':''}}>2XL
                                        </option>
                                        <option value="3XL" {{ $guest->tshirt_size == "3XL" ? 'selected':''}}>3XL
                                        </option>
                                    </select>
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
                    <!-- /.box-body -->
                    <!-- Add Flights modal -->
                    <div class="modal fade" id="modalAddFlight" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Add Flight</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/guests/add_guest_flight/'.$guest->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                            <label for="arrival_flight">Arrival Flight:</label>
                                            <input type="text" name="arrival_flight" class="form-control">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label for="arrival_time">Arrival time:</label>
                                            <input type="text" name="arrival_time" class="form-control ">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label for="departure_flight">Departure Flight:</label>
                                            <input type="text" name="departure_flight" class="form-control">
                                        </div>

                                        <div class="md-form md-5">
                                            <label for="departure_time">Departure Time:</label>
                                            <input type="text" name="departure_time" class="md-textarea form-control">
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-default">Submit</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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