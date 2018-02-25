<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * This scope will return all booked rooms
     * @param $query
     */
    public function scopeGetBookedRooms($query)
    {
        return $query->join('customers', 'bookings.customers_id', '=', 'customers.id')
            ->join('rooms', 'bookings.rooms_id', '=', 'rooms.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->where('bookings.active', 1)
            ->select(['bookings.*', 'customers.name as customer_name', 'customers.address as customer_address'
                , 'customers.email as customer_email', 'customers.phone as customer_phone', 'customers.gender', 'customers.occupation', 'customers.designation',
                'rooms.room_code', 'rooms.name as room_name', 'rooms.id as room_id', 'room_types.name as type_name', 'room_types.rent'])
            ->paginate(6);
    }

    public function scopeGetBookedRoom($query, $id)
    {
        return $query->join('customers', 'bookings.customers_id', '=', 'customers.id')
            ->join('rooms', 'bookings.rooms_id', '=', 'rooms.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->where('bookings.id', $id)
            ->select(['bookings.*', 'customers.name as customer_name', 'customers.address as customer_address'
                , 'customers.email as customer_email', 'customers.phone as customer_phone', 'customers.gender', 'customers.occupation', 'customers.designation',
                'rooms.room_code', 'rooms.name as room_name', 'rooms.id as room_id', 'room_types.name as type_name', 'room_types.rent'])
            ->first();
    }
}
