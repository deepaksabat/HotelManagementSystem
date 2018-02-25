@extends('backend.layout')
@section('dashboard')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{url('/admin/blocks/add')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add new</strong> Block</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Add information about your new Block, Please be notified whoever is
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
                                <label class="col-md-3 col-xs-12 control-label">Name</label>

                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="Block name ex: A, B, C?"
                                               name="name"/>
                                    </div>
                                    <span class="help-block">Enter the name the block will be known as</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Full Description</label>

                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                    <span class="help-block">Full Description about this block..</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Available?</label>

                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><input type="checkbox" class="icheckbox" checked="checked"
                                                                name="available"/>
                                        Yes</label>
                                    <span class="help-block">Check if this block is available for customer</span>
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