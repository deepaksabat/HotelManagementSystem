@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/customers/edit/'.$customer->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Update</strong> Customer</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Update information about incoming new customers whos infomation is not stored on the
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
                                <label class="col-md-3 col-xs-12 control-label">Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="customer name"
                                               name="name" value="{{$customer->name}}"/>
                                    </div>
                                    <span class="help-block">Customer's Full name</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="customer email address"
                                               name="email" value="{{$customer->email}}"/>
                                    </div>
                                    <span class="help-block">Customer's Email Address</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Phone Number</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                        <input type="text" class="form-control" placeholder="customer phone number"
                                               name="phone" value="{{$customer->phone}}"/>
                                    </div>
                                    <span class="help-block">Customer's Phone Number</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Password"/>
                                    </div>
                                    <span class="help-block">Password for customer access to his information</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Occupation</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-info"></span></span>
                                        <input type="text" class="form-control" name="occupation"
                                               placeholder="Occupation" value="{{$customer->occupation}}"/>
                                    </div>
                                    <span class="help-block">Customer Occupation</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Designation</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-info"></span></span>
                                        <input type="text" class="form-control" name="designation"
                                               placeholder="Designation" value="{{$customer->designation}}"/>
                                    </div>
                                    <span class="help-block">Customer Designation</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Registered On</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" value="2014-11-01">
                                    </div>
                                    <span class="help-block">**It's just to show that your registration date is stored, user input won't work here.. :)</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Full Address</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5"
                                              name="address">{{$customer->address}}</textarea>
                                    <span class="help-block">Customer Full Address here</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender</label>

                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control select" name="gender">
                                        <option value="male"><i class="fa fa-male"></i>Male</option>
                                        <option value="female"><i class="fa fa-female"></i>Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="help-block">select your gender, if not listed please select 'Other'</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Proof of identity</label>

                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="proof" id="filename"
                                           title="Browse file"/>
                                    <span class="help-block">ID card's image file with owner's image.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Checkbox</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox"
                                                                class="icheckbox" {{$customer->active==1?'checked="checked"':''}}/>
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