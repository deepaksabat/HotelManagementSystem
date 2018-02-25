<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>{{config('app.name','Hotel Management')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="{{config('app.developer','Abdullahil Ashik Md Arefin')}}"/>

    @include('backend.resources.top')
            <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    @include('backend.menu.left')
            <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        @include('backend.menu.topbar')
                <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        @yield('breadcrumb')
                <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        @yield('dashboard')
                <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>

                <p>Press No if you want to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ url('/logout') }}" class="btn btn-success btn-lg"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
@include('backend.resources.bottom')
        <!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>






