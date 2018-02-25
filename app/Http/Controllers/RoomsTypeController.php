<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $room_type = RoomType::paginate(12);
        return view('backend.rooms_type.index')
            ->with('room_type', $room_type);
    }

    /**
     * Show page for adding new blck
     */
    public function showNew()
    {
        return view('backend.rooms_type.new');

    }

    /*
     * Post new information about new block
     */
    public function postNew(Request $request)
    {
        $block = new RoomType();
        $block->name = $request->name;
        $block->description = $request->description;
        $block->capacity = $request->capacity;
        $block->rent = $request->rent;
        $block->active = 1;
        $block->save();


        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New room type has been Added<br/>Block Name: " . $request->name;
        $emp->save();


        return back()->with('success', ' New Room Type has been added');

    }

    /** show edit page for room
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEdit($id)
    {
        $room_type = RoomType::find($id);
        return view('backend.rooms_type.edit')->withRoomType($room_type);

    }

    /** post edit information about the room
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $block = RoomType::find($id);
        $block->name = $request->name;
        $block->description = $request->description;
        $block->capacity = $request->capacity;
        $block->rent = $request->rent;
        $block->active = $request->available == "on" ? 1 : 0;
        $block->save();


        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Updated room type information.<br/>Block Name: " . $request->name;
        $emp->save();

        return back()->with('success', ' Room Type has been Updated');
    }

    /**
     * Delete room type
     */
    public function deleteRoomType($id)
    {
        $room = RoomType::find($id);
        $room->delete();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Deleted room type<br/>Block Name: " . $room->name;
        $emp->save();
        return back()->with('deleted', ' Information has been deleted!');
    }
}
