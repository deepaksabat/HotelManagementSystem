@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/rooms/add')}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add new</strong> Room</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Add information about your new room, if you have the floor specified already then simple
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
                                <label class="col-md-3 col-xs-12 control-label">Room Code</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="room code"
                                               name="code"/>
                                    </div>
                                    <span class="help-block">Room code</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="room known as?"
                                               name="name"/>
                                    </div>
                                    <span class="help-block">Enter the name the room will be known as</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Floor Level</label>

                                <div class="col-md-6 col-xs-12">
                                    <select style="display: none;" class="form-control select" name="floor_level">
                                        <option>----- Select Floor Level -----</option>
                                        @foreach(\App\Floor::select(['level_no','id'])->get() as $data)
                                            <option value="{{$data->id}}">Level {{ $data->level_no}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">Select Floor Level Number</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Block</label>

                                <div class="col-md-6 col-xs-12">
                                    <select style="display: none;" class="form-control select" name="block">
                                        <option>----- Select Room Block -----</option>
                                        @foreach(\App\Block::select(['name','id'])->get() as $data)
                                            <option value="{{$data->id}}">Block {{ $data->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">In which block this room belongs?</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Room Type</label>

                                <div class="col-md-6 col-xs-12">
                                    <select style="display: none;" class="form-control select" name="room_type">
                                        <option value="0">----- Select Room Type -----</option>
                                        @foreach(\App\RoomType::select(['name','id'])->get() as $type)
                                            <option value="{{$type->id}}">{{ $type->name }} Room</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">In which block this room belongs?</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Full Description</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                    <span class="help-block">Full Description about this room..</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Available?</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox" class="icheckbox" checked="checked"
                                                                name="available"/>
                                        Yes</label>
                                    <span class="help-block">Check if room is available for customer</span>
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