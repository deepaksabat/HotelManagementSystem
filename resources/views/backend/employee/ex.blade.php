@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Use search to find Ex employee. You can search by: name, address, phone. Or use the
                            advanced
                            search.</p>

                        <form class="form-horizontal" action="{{url('admin/employee/search/ex')}}">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control"
                                               placeholder="Who are you looking for?"
                                               name="keyword"/>

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('admin/employee/add')}}" class="btn btn-success btn-block"><span
                                                class="fa fa-plus"></span> Add new
                                        Employee
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @if(isset($users) && $users->count()>0)


            <div class="row">
                @if(isset($users))
                    @foreach($users as $user)
                        <div class="col-md-3">
                            <!-- CONTACT ITEM -->
                            <div class="panel {{$user->active==1?'panel-success':'panel-danger'}}">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                        @if($user->gender=='male')
                                            <img src="{{asset('backend/assets/images/users/user2.jpg')}}"
                                                 alt="{{$user->firstname}}"/>
                                        @else
                                            <img src="{{asset('backend/assets/images/users/user.jpg')}}"
                                                 alt="{{$user->firstname}}"/>
                                        @endif
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name">{{$user->firstname.' '.$user->middlename.' '.$user->lastname}}</div>
                                        <div class="profile-data-title">User Role Here</div>
                                    </div>
                                    <div class="profile-controls">
                                        <a href="{{url('admin/employee/edit/'.$user->id)}}"
                                           class="profile-control-left"><span class="fa fa-edit"></span></a>
                                        <a href="{{url('admin/employee/delete/'.$user->id)}}"
                                           class="profile-control-right"><span
                                                    class="fa fa-eraser"></span></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="contact-info">
                                        <p>
                                            <small>Mobile</small>
                                            <br/>{{$user->phone}}
                                        </p>
                                        <p>
                                            <small>Email</small>
                                            <br/>{{$user->email}}
                                        </p>
                                        <p>
                                            <small>Address</small>
                                            <br/>{{$user->address}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($users))
                        {{$users->render()}}
                    @endif
                </div>
            </div>
        @else
            <div class="row`">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            {{--<button type="button" class="close" data-dismiss="alert"><span--}}
                                        {{--aria-hidden="true">×</span><span class="sr-only">Close</span></button>--}}
                            <strong>Error! </strong> You don't have any ex employee right now!. Please add more.
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@stop