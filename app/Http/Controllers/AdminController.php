<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use App\UserModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This will show all employee information
     */
    public function index()
    {
        $users = User::where('active',1)->paginate(6);
        return view('backend.employee.index')
            ->withUsers($users);

    }

    /**
     * Show input form for adding new employe
     */
    public function showForm()
    {
        return view('backend.employee.new');

    }

    /** Post information for the new user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNew(Request $request)
    {
        // from elequent fname, lname,mname,email,password,phone,address,gender,proof
        // from db firstname,middlename,lastname,email,password,phone,address,gender

        $user = new User();
        $user->firstname = $request->fname;
        $user->middlename = $request->mname;
        $user->lastname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->active = 1;
        $user->proof = ' ';
        $user->save();
        return back()->with('success', ' New Employee has been added!');
    }

    /** showing expired employee */
    public function exEmp()
    {
        $users = User::where('active', 0)->paginate(6);
        return view('backend.employee.ex')
            ->withUsers($users);
    }

    /**
     * Show edit page for employees
     */
    public function showEdit($id)
    {
        $user = User::find($id);
        return view('backend.employee.edit')->withUser($user);
    }

    /** post edit information about the user
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->firstname = $request->fname;
        $user->middlename = $request->mname;
        $user->lastname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->active = $request->available == "on" ? 1 : 0;
        $user->proof = ' ';
        $user->save();
        return back()->with('success', ' Employee has been Updated!');
    }

    /** delete employee information */
    public function deleteEmployee($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return back()->with('deleted', 'Employee has been deleted!');
    }

    /** show employee role add page */
    public function showRoleForm()
    {
        $roles = Role::getUserRole();
        return view('backend.employee.role-add')
            ->withRoles($roles);
    }

    /** this will assign asked role for specified user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRole(Request $request)
    {
        $role = new RoleUser();
        $data = [
            'role_id' => $request->role,
            'user_id' => $request->user
        ];
        $role->create($data);
        return back()->with('success', ' Role Has been assigned');
    }

    /** search employee
     * @param Request $request
     */
    public function search(Request $request)
    {
        $users = UserModel::where('firstname', 'like', '%' . $request->keyword . '%')
            ->orWhere('middlename', 'like', '%' . $request->keyword . '%')
            ->orWhere('lastname', 'like', '%' . $request->keyword . '%')
            ->orWhere('phone', 'like', '%' . $request->keyword . '%')
            ->orWhere('email', 'like', '%' . $request->keyword . '%')
            ->orWhere('address', 'like', '%' . $request->keyword . '%')
            ->orWhere('gender', 'like', '%' . $request->keyword . '%')
            ->where('active', 1)
            ->paginate(9);
        return view('backend.employee.index')
            ->withUsers($users);
    }

    /** search employee
     * @param Request $request
     */
    public function searchEx(Request $request)
    {
        $users = UserModel::where('firstname', 'like', '%' . $request->keyword . '%')
            ->orWhere('middlename', 'like', '%' . $request->keyword . '%')
            ->orWhere('lastname', 'like', '%' . $request->keyword . '%')
            ->orWhere('phone', 'like', '%' . $request->keyword . '%')
            ->orWhere('email', 'like', '%' . $request->keyword . '%')
            ->orWhere('address', 'like', '%' . $request->keyword . '%')
            ->orWhere('gender', 'like', '%' . $request->keyword . '%')
            ->where('active', 0)
            ->paginate(9);
        return view('backend.employee.ex')
            ->withUsers($users);
    }
}
