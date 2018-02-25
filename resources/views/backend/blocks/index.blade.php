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
            @if($blocks)
                @foreach($blocks as $block)
                    <div class="col-md-3">
                        <div class="widget {{$block->active==1?'widget-success':'widget-danger'}} widget-padding-sm">
                            <div class="widget-big-int">Block {{$block->name}}</div>
                            <div class="widget-data">Information: {{$block->description}}</div>
                            <div class="widget-controls">
                                <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                            </div>
                            <div class="widget-buttons widget-c2">
                                <div class="col">
                                    <a href="{{url('/admin/blocks/edit/'.$block->id)}}"><span class="fa fa-edit"></span></a>
                                </div>
                                <div class="col">
                                    <a href="{{url('/admin/blocks/delete/'.$block->id)}}"><span
                                                class="fa fa-eraser"></span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@stop