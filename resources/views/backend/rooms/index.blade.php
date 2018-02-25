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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>use this search form to find rooms, you can search using room name, room code room description</p>

                        <form class="form-horizontal" action="{{url('admin/rooms/search')}}">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="what are you looking for?" name="keyword"/>

                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('admin/rooms/add')}}" class="btn btn-success btn-block"><span class="fa fa-plus"></span> Add new
                                        Room
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($rooms) && $rooms->count()>0)
                @foreach($rooms as $room)
                    <div class="col-md-4">
                        <!-- START PRIMARY PANEL -->
                        <div class="panel {{$room->available==1?'panel-info':'panel-danger'}}">
                            <div class="panel-heading">
                                <h6 class="panel-title">{{$room->name}} - <span
                                            class="label label-info">{{$room->room_code}}</span></h6>
                                <ul class="panel-controls">
                                    <li><a href="{{url('admin/rooms/edit/'.$room->id)}}"><span
                                                    class="fa fa-edit"></span></a></li>
                                    <li><a href="{{url('admin/rooms/delete/'.$room->id)}}"><span
                                                    class="fa fa-eraser"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p><label>Description: </label> {{substr($room->description,0,50).'...'}}<i>( click on
                                        see details button for detailed description )</i></p>

                                <p><label>Located: </label> Block {{ $room->block_name}} - Floor
                                    Level {{ $room->level_no}}</p>

                                <p><label>Rent: </label><span
                                            class="fa fa-money"></span> {{$room->rent}} {{config('app.currency','BDT')}}
                                </p>
                            </div>
                            <div class="panel-footer">
                                <p class="label {{$room->active==1?'label-info':'label-danger'}}">
                                    <label>Status: </label> {{$room->active==1?' Available':' Not available'}}</p>
                                {{--<a class="btn btn-primary pull-right btn-sm">See Details</a>--}}
                            </div>
                        </div>
                        <!-- END PRIMARY PANEL -->
                    </div>

                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <strong>Error! </strong> You don't have any rooms right now. Please add more.
                    </div>
                </div>
            @endif
        </div>
        <!-- END SIMPLE PANELS -->
        <div class="clearfix"></div>
    </div>
@stop