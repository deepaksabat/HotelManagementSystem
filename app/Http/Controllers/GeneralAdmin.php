<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralAdmin extends Controller
{
    /** mark task as done
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function done($id)
    {
        $task = Task::find($id);
        $task->active = 0;
        $task->seen = 1;
        $task->save();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Task completed!<br/>Task id: " . $task->id;
        $emp->save();
        return back();
    }
}
