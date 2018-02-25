<?php

namespace App\Http\Controllers;

use App\EmployeeActivity;
use App\Floor;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FloorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $floors = Floor::get();

        return view('backend.floors.index')
            ->with('floors', $floors);
    }

    /** show new floor input form */
    public function showNew()
    {

        return view('backend.floors.new');
    }

    /** post new information about floor and save it to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNew(Request $request)
    {
        $floor = new Floor();
        $floor->name = $request->name;
        $floor->floor_code = $request->code;
        $floor->level_no = $request->floor_level;
        $floor->description = $request->description;
        $floor->active = $request->available == "on" ? 1 : 0;
        $floor->save();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New Floor Added<br/>Floor Code: " . $request->code;
        $emp->save();

        return back()->with('success', ' New Floor has been added.!');

    }

    /**
     * This method will be used to show all
     * rooms existing in current floor
     * @param $id
     * @return $this
     */
    public function showRooms($id)
    {

        // based on this id all rooms on current floor id will be returned
        $rooms = Room::getRoomsOnFloor($id);
        return view('backend.rooms.index')
            ->with('rooms', $rooms);
    }

    /**
     * Show edit Form
     * @param $id
     */
    public function showEdit($id)
    {
        $floor = Floor::find($id);
        return view('backend.floors.edit')
            ->withFloor($floor);
    }

    /** post edited information and update floor data
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $floor = Floor::find($id);
        $floor->name = $request->name;
        $floor->floor_code = $request->code;
        $floor->level_no = $request->floor_level;
        $floor->description = $request->description;
        $floor->active = $request->available == "on" ? 1 : 0;
        $floor->save();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Updated Floor Information<br/>Floor Code: " . $request->code;
        $emp->save();

        return back()->with('success', ' Floor has been updated.!');
    }

    /**
     * Delete floor data
     */
    public function deleteFloor($id)
    {
        $floor = Floor::find($id);
        $floor->delete();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Floor deleted<br/>Floor Code: " . $floor->floor_code;
        $emp->save();
        return back()->with('deleted', ' Floor has been deleted.!');
    }

    /** search floor
     * @param Request $request
     * @return $this
     * @internal param $keyword
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $floors = Floor::where('name', 'like', '%' . $keyword . '%')->
        orWhere('level_no', 'like', '%' . $keyword . '%')->
        orWhere('floor_code', 'like', '%' . $keyword . '%')->
        orWhere('description', 'like', '%' . $keyword . '%')->get();

        return view('backend.floors.index')
            ->with('floors', $floors);
    }
}
