<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // show all customers
    public function index()
    {
        $employee = User::paginate(12);
        return view('backend.employee.index')
            ->with('employees', $employee);

    }

// show add new customer page or form
    public function showNew()
    {
        return view('backend.employee.new');

    }

    // add new customer
    public function postUser(Request $request)
    {
        // name,email,password,address,gender,proof,phone
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New Customer Added <br/>Customer Name: " . $request->name;
        $emp->save();

        return back()->with('success', 'New User has been added..! Please Assign his role..');

    }

}
