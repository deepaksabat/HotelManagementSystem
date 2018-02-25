<?php

namespace App\Http\Controllers;

use App\Booking;
use App\CheckTime;
use App\Customers;
use App\EmployeeActivity;
use App\Room;
use App\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method will be used to show all bookings information about all rooms existing on booking table
     */
    public function index()
    {
        $bookings = Booking::getBookedRooms();
        return view('backend.bookings.index')
            ->with('bookings', $bookings);
    }

    /**
     * This will show new booking form
     */
    public function showNew()
    {
        $customers = Customers::select(['id', 'name', 'designation'])->get();
        $rooms = Room::getBookingRooms();
        return view('backend.bookings.new')
            ->withCustomers($customers)
            ->withRooms($rooms);
    }

    /**
     * This method will post new booking information on the database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNew(Request $request)
    {
        // from blade: customer,room,time_to_stay,people,amount,available
        //from db: customers_id, rooms_id, checkin_time, checkout_time,total_bill, paid_bill,num_people,room_status
        $check_time = CheckTime::where('active', 1)->first();
        $check_in_time = new Carbon(Carbon::now()->toDateString() . $check_time->check_in);
        $check_out_time = Carbon::today()->addDays($request->time_to_stay)->toDateString();
        $check_out_time = new Carbon($check_out_time . $check_time->check_out);
        $customer = new Booking();
        $days = $request->time_to_stay;
        $rent = RoomType::getRent($request->room);
        $customer->customers_id = $request->customer;
        $customer->rooms_id = $request->room;
        $customer->checkin_time = $check_in_time;
        $customer->checkout_time = $check_out_time;
        $customer->num_people = $request->people;
        $customer->paid_bill = $request->amount;
        $customer->total_bill = $days * $rent->rent;
        $customer->active = 1;
        $customer->save();

        /** disable related room */
        $room = Room::find($request->room);
        $room->active = 0;
        $room->save();
        $cinfo = Customers::find($request->customer);
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New Room Booked. Customer name: " . $cinfo->name . "<br/>Customer address: "
            . $cinfo->address . ' <br/>Customer contact: ' . $cinfo->phone . ', ' . $cinfo->email . '<br>Time to stay: ' . $days . '<br/>Total Bill: ' . $days * $rent->rent
            . '<br/>Paid: ' . $request->amount;
        $emp->save();

        return back()->with('booking', ' Room has been successfully booked!');


    }

    /** show checkout form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCheckout($id)
    {
        $bookings = Booking::getBookedRoom($id);
        return view('backend.bookings.checkout')
            ->with('bookings', $bookings);
    }

    /** post checkout form
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCheckout(Request $request, $id)
    {
        $booking = Booking::find($id);
        $rented = RoomType::getRent($booking->rooms_id);
        $days = $request->days;
        $booking->paid_bill += $request->amount;
        $booking->total_bill = $days * $rented->rent;
        $booking->active = 0;
        $booking->save();
        $room = Room::find($booking->rooms_id);
        $room->active = 1;
        $room->save();

        $cinfo = Customers::find($booking->customers_id);

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Check Out Room . Customer name: " . $cinfo->name . "<br/>Customer address: "
            . $cinfo->address . ' <br/>Customer contact: ' . $cinfo->phone . ', ' . $cinfo->email . '<br>Time to stay: '
            . $days . '<br/>Total Bill: ' . $days * $rented->rent
            . '<br/>Paid: ' . $request->amount;
        $emp->save();


        return back()->with('checkout', ' checkout complete!');

    }
}
