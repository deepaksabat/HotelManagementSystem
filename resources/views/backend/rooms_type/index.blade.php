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
            @if(session('deleted'))
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <strong>Notification! </strong> {{session('deleted')}}
                    </div>
                </div>
            @endif
            @if(isset($room_type) && $room_type->count()>0)
                @foreach($room_type as $data)
                    <div class="col-md-4">
                        <!-- START PRIMARY PANEL -->
                        <div class="panel {{$data->active==1?'panel-info':'panel-danger'}}">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$data->name}}</h3>
                                <ul class="panel-controls">
                                    <li><a href="{{url('admin/roomtype/edit/'.$data->id)}}"><span
                                                    class="fa fa-edit"></span></a></li>
                                    <li><a href="{{url('admin/roomtype/delete/'.$data->id)}}"><span
                                                    class="fa fa-eraser"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p><label>Description: </label> {{$data->description}}</p>

                                <p class="label {{$data->active==1?'label-info':'label-danger'}}">
                                    <label>Status: </label> {{$data->active==1?' Available':' Not available'}}</p>
                            </div>
                            <div class="panel-footer">
                                <a class="btn btn-primary pull-right btn-sm"
                                   href="{{url('/admin/floors/rooms/'.$data->id)}}">See Rooms</a>
                            </div>
                        </div>
                        <!-- END PRIMARY PANEL -->
                    </div>
                @endforeach
                {{$room_type->render()}}
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <strong>Error! </strong> You don't have any room's type right now. Please add more.
                    </div>
                </div>
            @endif

        </div>
    </div>
@stop