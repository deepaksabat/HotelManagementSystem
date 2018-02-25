<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use Illuminate\Http\Request;

class DashboardPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activities = EmployeeActivity::orderBy('id', 'desc')->paginate(20);
        return view('backend.dashboard.index')
            ->with('activities', $activities);
    }
}
