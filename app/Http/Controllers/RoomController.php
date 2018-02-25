<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::getRooms();
        //dd($rooms);
        return view('backend.rooms.index')
            ->with('rooms', $rooms);
    }

    /** show add new room page */
    public function showNew()
    {
        return view('backend.rooms.new');
    }

    /**
     * Add new room to the database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRoom(Request $request)
    {
        //code , name , floor_level, block, room_type, description, available

        //dd($request->all());
        $room = new Room();
        $room->room_code = $request->code;
        $room->floor_id = $request->floor_level;
        $room->name = $request->name;
        $room->type_id = $request->room_type;
        $room->block_id = $request->block;
        $room->description = $request->description;
        $room->active = $request->available == "on" ? 1 : 0;
        $room->save();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New Room Added<br/>Room Code: " . $request->code;
        $emp->save();

        return back()->with('success', 'New Room Has been added!');
    }

    /**
     * Show edit form for rooms
     * @param $id
     */
    public function showEdit($id)
    {
        $room = Room::find($id);
        return view('backend.rooms.edit')
            ->withRoom($room);

    }

    /**
     * Post or update edited information for the room
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $room = Room::find($id);
        $room->room_code = $request->code;
        $room->floor_id = $request->floor_level;
        $room->name = $request->name;
        $room->type_id = $request->room_type;
        $room->block_id = $request->block;
        $room->description = $request->description;
        $room->active = $request->available == "on" ? 1 : 0;
        $room->save();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Updated Room Information.<br/>Room Code: " . $request->code;
        $emp->save();

        return back()->with('success', ' Room Has been Updated!');
    }

    /** delete specified room by id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRoom($id)
    {
        $room = Room::find($id);
        $room->delete();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Room has been deleted.<br/>Floor Code: " . $room->code;
        $emp->save();

        return back()->with('deleted', ' Room has been deleted!');
    }

    /** search rooms
     * @param Request $request
     * @return $this
     */
    public function search(Request $request)
    {

        $keyword = $request->keyword;
        $rooms = Room::searchRooms($keyword);
        return view('backend.rooms.index')
            ->with('rooms', $rooms);
    }
}
