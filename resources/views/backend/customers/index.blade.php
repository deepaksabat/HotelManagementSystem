@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Use search to find customers. You can search by: name, address, phone. Or use the advanced
                            search.</p>

                        <form class="form-horizontal" action="{{url('/admin/customers/search')}}">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Who are you looking for?"
                                               name="keyword"/>

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('/admin/customers/add')}}" class="btn btn-success btn-block"><span
                                                class="fa fa-plus"></span> Add new
                                        Customer
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            @if(isset($customers))
                @foreach($customers as $customer)
                    <div class="col-md-3">
                        <!-- CONTACT ITEM -->
                        <div class="panel panel-default">
                            <div class="panel-body profile">
                                <div class="profile-image">
                                    @if($customer->gender=="male")
                                        <img src="{{asset('backend/assets/images/users/user2.jpg')}}"
                                             alt="{{$customer->name}}"/>
                                    @else
                                        <img src="{{asset('backend/assets/images/users/user.jpg')}}"
                                             alt="{{$customer->name}}"/>
                                    @endif
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name">{{$customer->name}}</div>
                                    <div class="profile-data-title">{{$customer->occupation}}
                                        -{{$customer->designation}}</div>
                                </div>
                                <div class="profile-controls">
                                    <a href="{{url('/admin/customers/edit/'.$customer->id)}}"
                                       class="profile-control-left"><span class="fa fa-edit"></span></a>
                                    <a href="{{url('/admin/customers/delete/'.$customer->id)}}"
                                       class="profile-control-right"><span class="fa fa-eraser"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="contact-info">
                                    <p>
                                        <small>Mobile</small>
                                        <br/>{{$customer->phone}}
                                    </p>
                                    <p>
                                        <small>Email</small>
                                        <br/>{{$customer->email}}
                                    </p>
                                    <p>
                                        <small>Address</small>
                                        <br/>{{$customer->address}}
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
                {{--<ul class="pagination pagination-sm pull-right push-down-10 push-up-10">--}}
                {{--<li class="disabled"><a href="#">«</a></li>--}}
                {{--<li class="active"><a href="#">1</a></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">4</a></li>--}}
                {{--<li><a href="#">»</a></li>--}}
                {{--</ul>--}}
                @if(isset($customers))
                    {{$customers->render()}}
                @endif
            </div>
        </div>

    </div>
@stop