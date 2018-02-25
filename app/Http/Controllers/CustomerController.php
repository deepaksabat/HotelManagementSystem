<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show all customers
    public function index()
    {
        $customer = Customers::paginate(8);
        return view('backend.customers.index')
            ->with('customers', $customer);

    }

// show add new customer page or form
    public function showNew()
    {
        return view('backend.customers.new');

    }

    // add new customer
    public function postCustomer(Request $request)
    {
        // name,email,password,address,gender,proof,phone
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->occupation = $request->occupation;
        $customer->designation = $request->designation;
        $customer->password = bcrypt($request->password);
        //$customer->active = $request->available == "on" ? 1 : 0;
        $customer->save();
        return back()->with('success', 'New Customer has been added..!');
    }

    /** this will show customer information edit form
     * @param $id
     * @return $this
     */
    public function showEdit($id)
    {
        $customer = Customers::find($id);
        return view('backend.customers.edit')
            ->with('customer', $customer);
    }

    /**
     * Post Edit information about customers
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $customer = Customers::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->occupation = $request->occupation;
        $customer->designation = $request->designation;
        $customer->password = bcrypt($request->password);
        $customer->save();
        return back()->with('success', ' Customer Information has been Updated..!');
    }

    /**
     * Delete Customer
     */
    public function deleteCustomer($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return back()->with('deleted', 'Information has been deleted!');
    }

    /** this will search customer information
     * @param Request $request
     * @return $this
     */
    public function search(Request $request)
    {
        $customers = Customers::where('name', 'like', '%' . $request->keyword . '%')
            ->orWhere('phone', 'like', '%' . $request->keyword . '%')
            ->orWhere('email', 'like', '%' . $request->keyword . '%')
            ->orWhere('address', 'like', '%' . $request->keyword . '%')
            ->orWhere('gender', 'like', '%' . $request->keyword . '%')
            ->paginate(8);
        return view('backend.customers.index')
            ->with('customers', $customers);

    }
}
