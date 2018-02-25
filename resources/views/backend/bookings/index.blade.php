@extends('backend.layout')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Dashboard</li>
    </ul>
@stop
@section('dashboard')
    <div class="page-content-wrap">

        <div class="row">
            @if(isset($bookings) && $bookings->count()>=1)
                @foreach($bookings as $book)
                    <div class="col-md-4">
                        <!-- START PRIMARY PANEL -->
                        <div class="panel {{$book->active==1?'panel-info':'panel-danger'}}">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$book->room_name}} - {{$book->room_code}}</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                                    class="fa fa-cog"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="panel-collapse"><span
                                                            class="fa fa-angle-down"></span>
                                                    Collapse</a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span>
                                                    Refresh</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <th>Room is booked to</th>
                                        <td>{{$book->customer_name}}
                                            , {{$book->customer_address}},
                                            {{$book->customer_phone}},
                                            {{$book->customer_email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Adult Staying</th>
                                        <td>{{$book->num_people}}</td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td><strong>From </strong>{{ $book->checkin_time}} <strong>
                                                To </strong> {{ $book->checkout_time}}</td>
                                    </tr>
                                </table>
                                <p><strong>Billing: </strong>
                                    <label class="label label-info">Total {{$book->total_bill}} [expected]</label>
                                    <label class="label label-success">Paid {{$book->paid_bill}}</label>
                                    <label class="label label-danger">Due {{$book->total_bill - $book->paid_bill}}</label>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <p class="label {{$book->active==1?'label-info':'label-danger'}}">
                                    <label>Status: </label> {{$book->active==1?' Available':' Not available'}}</p>
                                <a class="btn btn-primary pull-right btn-sm"
                                   href="{{url('/admin/bookings/checkout/'.$book->id)}}">Edit Info/ Complete Payment</a>
                            </div>
                        </div>
                        <!-- END PRIMARY PANEL -->
                    </div>
                @endforeach
                {{$bookings->render()}}
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <h5>Error!</h5> <span>Currently No room is booked!</span>
                    </div>
                </div>
            @endif
        </div>
        <!-- END SIMPLE PANELS -->

    </div>
@stop