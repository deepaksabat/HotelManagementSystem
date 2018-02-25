@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/tasks/add')}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add new</strong> Task</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Add information about incoming new customers whos infomation is not stored on the
                                database previously. If added then you can
                                proceed to the booking section and select his/her information while booking or reserving
                                rooms for him/her.</p>
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
                                <label class="col-md-3 col-xs-12 control-label">Title</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="task title"
                                               name="title"/>
                                    </div>
                                    <span class="help-block">Task title</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Detailed Description</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                    <span class="help-block">Full Description</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employee</label>

                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control select" name="emp">
                                        @foreach(App\User::where('active',1)->get() as $user)
                                            <option value="{{$user->id}}">{{$user->firstname.' '.$user->middlename.' '.$user->lastname}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">select your gender, if not listed please select 'Other'</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Additional Attachment</label>

                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="attachment" id="filename"
                                           title="Browse file"/>
                                    <span class="help-block">Additional attachment</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Checkbox</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/>
                                        Checkbox title</label>
                                    <span class="help-block">Checkbox sample, easy to use</span>
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