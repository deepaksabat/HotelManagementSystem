<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- SIGN OUT -->
    <li class="xn-icon-button pull-right">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span></a>
    </li>
    <!-- END SIGN OUT -->
    <!-- TASKS -->
    <li class="xn-icon-button pull-right">
        <a href="#"><span class="fa fa-tasks"></span></a>

        <div class="informer informer-warning">{{App\Task::where('active',1)->where('seen',0)->where('users_id',Auth::user()->id)->count()}}</div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>

                <div class="pull-right">
                    <span class="label label-warning">{{App\Task::where('active',1)->where('users_id',Auth::user()->id)->count()}}
                        active</span>
                </div>
            </div>
            <div class="panel-body list-group scroll" style="height: 200px;">
                @foreach(App\Task::where('active',1)->where('users_id',Auth::user()->id)->take(3)->get() as $task)
                    <a class="list-group-item" href="#">
                        <strong>{{$task->title}}</strong>

                        <p>{{substr($task->description,0,60)}}...</p>
                        <small class="text-muted">{{$task->created_at->diffForHumans()}}</small>
                    </a>
                @endforeach
            </div>
            <div class="panel-footer text-center">
                <a href="{{url('admin/tasks')}}">Show all tasks</a>
            </div>
        </div>
    </li>
    <!-- END TASKS -->
</ul>