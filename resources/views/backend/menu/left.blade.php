<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{url('/')}}">{{config('app.name','Hotel Management')}}</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                @if(Auth::user()->gender=="male")
                    <img src="{{asset('backend/assets/images/users/user2.jpg')}}" alt="{{Auth::user()->firstname}}"/>
                @else
                    <img src="{{asset('backend/assets/images/users/avatar.jpg')}}" alt="{{Auth::user()->firstname}}"/>
                @endif
            </a>

            <div class="profile">
                <div class="profile-image">
                    @if(Auth::user()->gender=="male")
                        <img src="{{asset('backend/assets/images/users/user2.jpg')}}"
                             alt="{{Auth::user()->firstname}}"/>
                    @else
                        <img src="{{asset('backend/assets/images/users/avatar.jpg')}}"
                             alt="{{Auth::user()->firstname}}"/>
                    @endif
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}</div>
                    {{--<div class="profile-data-title">Designation</div>--}}
                </div>
            </div>
        </li>
        <li class="xn-title">Menu</li>
        <li class="active">
            <a href="{{url('/admin')}}"><span class="fa fa-desktop"></span> <span
                        class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Floors</span></a>
            <ul>
                <li><a href="{{url('admin/floors')}}"><span class="fa fa-image"></span>All Floors</a></li>
                <li><a href="{{url('/admin/floors/add')}}"><span class="fa fa-user"></span> Add New Floor</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-clock-o"></span> Rooms</a>
            <ul>
                <li><a href="{{url('admin/rooms')}}"><span class="fa fa-align-center"></span> All Rooms</a></li>
                <li><a href="{{url('/admin/rooms/add')}}"><span class="fa fa-user"></span> Add New Room</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-clock-o"></span> Rooms Type</a>
            <ul>
                <li><a href="{{url('admin/roomtype')}}"><span class="fa fa-align-center"></span> All Rooms Type</a></li>
                <li><a href="{{url('/admin/roomtype/add')}}"><span class="fa fa-user"></span> Add New Room Type</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-clock-o"></span> Blocks</a>
            <ul>
                <li><a href="{{url('admin/blocks')}}"><span class="fa fa-align-center"></span> All Blocks</a></li>
                <li><a href="{{url('/admin/blocks/add')}}"><span class="fa fa-user"></span> Add New Block</a></li>
            </ul>
        </li>
        @role(('admin'))
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Employee</span></a>
            <ul>
                <li><a href="{{url('/admin/employee')}}">All Employee</a></li>
                <li><a href="{{url('/admin/employee/add')}}">Add New Employee</a></li>
                <li><a href="{{url('/admin/employee/ex')}}">All Ex-Employee</a></li>
                <li><a href="{{url('/admin/employee/roles/add')}}">Assign Employee Role</a></li>
            </ul>
        </li>
        @endrole
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Customers</span></a>
            <ul>
                <li><a href="{{url('/admin/customers')}}">All Customers</a></li>
                <li><a href="{{url('/admin/customers/add')}}">Add New Customer</a></li>
                {{--<li><a href="{{url('/admin/customers/statistics')}}">Customer Statistics</a></li>--}}
            </ul>
        </li>
        <li class="xn-title">Operation</li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Booking</span></a>
            <ul>
                <li><a href="{{url('/admin/bookings')}}"><span class="fa fa-heart"></span>All</a></li>
                <li><a href="{{url('/admin/bookings/book')}}"><span class="fa fa-magic"></span>Book a room</a></li>
                <li><a href="#"><span class="fa fa-cogs"></span>Set Check In/Out Time</a></li>
                <li><a href="#"><span class="fa fa-square-o"></span>Booked</a>

                    <div class="informer informer-warning">{{App\Booking::where('active', 1)->count()}}</div>
                </li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Tasks</span></a>
            <ul>
                <li><a href="{{url('/admin/tasks')}}"><span class="xn-text">Your Tasks</span></a></li>
                @role(('admin'))
                <li><a href="{{url('/admin/tasks/add')}}"><span class="xn-text">Assign New Tasks</span></a></li>
                @endrole
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>