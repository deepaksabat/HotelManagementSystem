@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/employee/roles/add')}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add new</strong> User</h3>
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
                            {{--First name--}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Employee</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                            <select class="form-control select" name="user">
                                                <option value="0">---Select An Employee---</option>
                                                @foreach(App\UserModel::where('active',1)->get() as $user)
                                                    <option value="{{$user->id}}">{{$user->firstname.' '.$user->middlename.' '.$user->lastname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="help-block">Employee name</span>
                                    </div>
                                </div>
                            </div>
                            {{--middle name--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Role</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                            <select class="form-control select" name="role">
                                                <option value="0">---Select A Role---</option>
                                                @foreach(App\Role::get() as $role)
                                                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="help-block">Role to Assign</span>
                                    </div>
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
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($roles))
                        @foreach($roles as $d => $role)
                            <tr>
                                <td>{{$d+1}}</td>
                                <td>{{$role->firstname.' '.$role->middlename.' '.$role->lastname}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{$role->phone}}</td>
                                <td>{{$role->email}}</td>
                                <td>{{$role->address}}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{url('admin/employee/roles/delete/'.$role->id)}}"><span class="fa fa-eraser"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        {{$roles->render()}}
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop