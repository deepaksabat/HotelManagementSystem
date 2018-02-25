<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use Illuminate\Http\Request;

class EmployeeActivityController extends Controller
{
    public function delete($id){
        $activity = EmployeeActivity::find($id);
        $activity->delete();
        return back();
    }
}
