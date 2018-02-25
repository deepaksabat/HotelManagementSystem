@extends('backend.layout')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Tasks</li>
    </ul>
@stop
@section('dashboard')
    <div class="page-content-wrap">

        <div class="row">
            @if(isset($tasks) && $tasks->count()>=1)
                @foreach($tasks as $task)
                    <div class="col-md-4">
                        <!-- START PRIMARY PANEL -->
                        <div class="panel {{$task->active==1?'panel-info':'panel-danger'}}">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$task->title}}</h3>
                            </div>
                            <div class="panel-body">
                                <article>
                                    <label>Description: </label> {{$task->description}}<br/>
                                    <label>Posted on: </label> {{$task->created_at->diffForHumans()}}<br/>
                                    <label>Last updated: </label> {{$task->updated_at->diffForHumans()}}<br/>
                                </article>
                            </div>
                            <div class="panel-footer">
                                <p class="label {{$task->active==1?'label-info':'label-danger'}}">
                                    <label>Status: </label> {{$task->active==1?' Available':' Not available'}}</p>
                                <a class="btn btn-primary pull-right btn-sm"
                                   href="{{url('/admin/tasks/done/'.$task->id)}}">Mark As Done</a>
                            </div>
                        </div>
                        <!-- END PRIMARY PANEL -->
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <h5>Error! </h5><span>You don't have any tasks assigned!</span>
                    </div>
                </div>
            @endif
        </div>
        <!-- END SIMPLE PANELS -->

    </div>
@stop