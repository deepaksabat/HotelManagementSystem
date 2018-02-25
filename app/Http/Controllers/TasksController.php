<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show tasks for logged in user
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $tasks = Task::where('users_id', $user_id)->where('active', 1)->paginate(12);
        return view('backend.tasks.index')
            ->withTasks($tasks);
    }

    /** show new page to add tasks */
    public function showNew()
    {
        return view('backend.tasks.new');
    }

    /** post new task information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postTask(Request $request)
    {
        $task = new Task();
        $task->users_id = $request->emp;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->admin_id = Auth::user()->id;
        $task->active = 1;
        $task->seen = 0;
        $task->save();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New task added.";
        $emp->save();
        return back()->with('success', ' Task has been successfully Added!');
    }

}
