@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/floors/edit/'.$floor->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Edit</strong> Floor</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Update information about your new floor, if you have the floor specified already then simple
                                just
                                navigate to the floors page and edit it's information. Please be notified whoever is
                                editing information
                                will be notified to the admin.</p>
                        </div>
                        <div class="panel-footer">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <strong>Success! </strong> {{session('success')}}
                                </div>
                            @endif
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Floor Code</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="floor code"
                                               name="code" value="{{$floor->floor_code}}"/>
                                    </div>
                                    <span class="help-block">Floor code</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="floor known as?"
                                               name="name" value="{{$floor->name}}"/>
                                    </div>
                                    <span class="help-block">Enter the name the floor will be known as</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Floor Level</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                        <input type="number" class="form-control" placeholder="ex: 1 or 2 or 3"
                                               name="floor_level" value="{{$floor->level_no}}"/>
                                    </div>
                                    <span class="help-block">Floor level number..</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Full Description</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5"
                                              name="description">{{$floor->description}}</textarea>
                                    <span class="help-block">Full Description about this floor..</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Available?</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox" class="icheckbox"
                                                                {{$floor->active==1?'checked="checked"':''}}
                                                                name="available"/>
                                        Yes</label>
                                    <span class="help-block">Check if floor is available for customer</span>
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
        </div>

    </div>
@stop