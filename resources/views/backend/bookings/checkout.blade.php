@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <form class="form-horizontal" action="{{url('/admin/bookings/checkout/'.$bookings->id)}}"
                          method="post">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Check out</strong> Room</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p>Please pay the due money if any and complete your check out information. Thank
                                    you!</p>
                            </div>
                            <div class="panel-footer">
                                @if(session('checkout'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <strong>Success! </strong> {{session('checkout')}}
                                    </div>
                                @endif
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Check In Time</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$bookings->checkin_time}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Total Bill</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$bookings->total_bill }} {{config('app.currency','Dollars')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Paid Bill</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$bookings->paid_bill }} {{config('app.currency','Dollars')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Due Bill</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$bookings->total_bill-$bookings->paid_bill }} {{config('app.currency','Dollars')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Days Stayed</label>

                                    <div class="col-md-6 col-xs-12">
                                        <input type="number" class="form-control" name="days"
                                               placeholder="how many days client has stayed, please input manually.."/>
                                        <span class="help-block"
                                              id="billing">How many days spend from check in time?</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Amount paying</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-money"></span></span>
                                            <input class="form-control"
                                                   value="{{$bookings->total_bill-$bookings->paid_bill}}" type="number"
                                                   name="amount"/>
                                        </div>
                                        <span class="help-block">Please pay the due bill and submit the form!</span>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default">Clear Form</button>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Room Booked</strong> Information</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Information about this room and person who is currently living here..</p>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$bookings->customer_name}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$bookings->customer_address}}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{$bookings->customer_phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$bookings->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{$bookings->gender}}</td>
                                </tr>
                                <tr>
                                    <th>Occupation</th>
                                    <td>{{$bookings->occupation}}</td>
                                </tr>
                                <tr>
                                    <th>Designation</th>
                                    <td>{{$bookings->designation}}</td>
                                </tr>
                                <tr>
                                    <th>Room Information</th>
                                    <td>{{$bookings->room_name}} - {{$bookings->room_code}} - {{$bookings->type_name}}
                                        Room
                                    </td>
                                </tr>
                                <tr>
                                    <th>Billing</th>
                                    <td><p><strong>Total Bill</strong> {{ $bookings->total_bill}}</p>

                                        <p><strong>Paid</strong> {{$bookings->paid_bill}}</p>

                                        <p><strong>Due</strong> {{$bookings->total_bill-$bookings->paid_bill}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Check in Time</th>
                                    <td>{{ $bookings->checkin_time}}</td>
                                </tr>
                                <tr>
                                    <th>Expected Check out Time</th>
                                    <td>{{ $bookings->checkout_time}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <label class="label label-info">Powered By {{config('app.name','Hotel Management')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop