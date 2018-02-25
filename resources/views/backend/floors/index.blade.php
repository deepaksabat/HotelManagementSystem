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
                        <p>Use search to find floors. You can search by: name, description, floor_code, level number</p>

                        <form class="form-horizontal" action="{{url('admin/floors/search')}}">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Who are you looking for?" name="keyword"/>

                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('admin/floors/add')}}" class="btn btn-success btn-block"><span class="fa fa-plus"></span> Add new
                                        Floor
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            @if(isset($floors) && $floors->count()>0)
                @foreach($floors as $floor)
                    <div class="col-md-4">
                        <!-- START PRIMARY PANEL -->
                        <div class="panel {{$floor->active==1?'panel-info':'panel-danger'}}">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$floor->name}}</h3>
                                <label class="label label-info">{{$floor->floor_code}}</label>
                                <ul class="panel-controls">
                                    <li><a href="{{url('admin/floors/edit/'.$floor->id)}}"><span
                                                    class="fa fa-edit"></span></a></li>
                                    <li><a href="{{url('admin/floors/delete/'.$floor->id)}}"><span
                                                    class="fa fa-eraser"></span></a></li>

                                </ul>
                            </div>
                            <div class="panel-body">
                                <article>
                                    <label>Description: </label> {{$floor->description}}<br/>
                                    <label>Data Available Since: </label> {{$floor->created_at->diffForHumans()}}<br/>
                                    <label>Last updated: </label> {{$floor->updated_at->diffForHumans()}}<br/>
                                    <label>Available
                                        Rooms: </label>
                                    <strong>Booked: </strong>{{ \App\Room::getBookedRooms($floor->id)->count()}}
                                    /
                                    <strong>Available: </strong> {{\App\Room::where('floor_id',$floor->id)->where('active',1)->count()}}
                                    / <strong> Total: </strong> {{\App\Room::where('floor_id',$floor->id)->count()}}
                                </article>

                                <p></p>

                                <p></p>

                                <p></p>


                            </div>
                            <div class="panel-footer">
                                <p class="label {{$floor->active==1?'label-info':'label-danger'}}">
                                    <label>Status: </label> {{$floor->active==1?' Available':' Not available'}}</p>
                                <a class="btn btn-primary pull-right btn-sm"
                                   href="{{url('/admin/floors/rooms/'.$floor->id)}}">See Rooms</a>
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
                        <strong>Error! </strong> You don't have any floors right now. Please add more.
                    </div>
                </div>
            @endif
        </div>
        <!-- END SIMPLE PANELS -->

    </div>
@stop