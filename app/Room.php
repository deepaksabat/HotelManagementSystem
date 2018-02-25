<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    /**
     * This will return full information about a room
     * @param $query
     * @return
     */
    public function scopeGetRooms($query)
    {
        return $query->join('blocks', 'rooms.block_id', '=', 'blocks.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->select(['rooms.*', 'floors.level_no', 'blocks.name as block_name', 'room_types.name as type_name', 'room_types.rent'])
            ->paginate(6);
    }

    /**
     * Search Rooms
     * @param $query
     * @param $room
     * @return
     */
    public function scopeSearchRooms($query, $room)
    {
        return $query->join('blocks', 'rooms.block_id', '=', 'blocks.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->where('rooms.name', 'like', '%' . $room . '%')
            ->orWhere('rooms.description', 'like', '%' . $room . '%')
            ->orWhere('room_types.name', 'like', '%' . $room . '%')
            ->orWhere('room_types.rent', 'like', '%' . $room . '%')
            ->select(['rooms.*', 'floors.level_no', 'blocks.name as block_name', 'room_types.name as type_name', 'room_types.rent'])
            ->paginate(6);
    }

    /**
     * This will return rooms for booking select menu
     * @param $query
     * @return
     */
    public function scopeGetBookingRooms($query)
    {
        return $query->join('blocks', 'rooms.block_id', '=', 'blocks.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->where('rooms.active', 1)
            ->select(['rooms.id', 'rooms.name', 'rooms.active', 'floors.level_no', 'blocks.name as block_name', 'room_types.name as type_name', 'room_types.rent'])
            ->get();
    }

    /**
     * This scope will return all rooms based on the floor id
     * a floor id will be passed and every rooms on that floor will be returned
     * @param $query
     * @param $id
     */
    public function scopeGetRoomsOnFloor($query, $id)
    {
        return $query->join('blocks', 'rooms.block_id', '=', 'blocks.id')
            ->join('room_types', 'rooms.type_id', '=', 'room_types.id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->where('floors.id', $id)
            ->select(['rooms.*', 'floors.level_no', 'blocks.name as block_name', 'room_types.name as type_name', 'room_types.rent'])
            ->paginate(8);

    }

    /** this will return rooms based on blocks
     * @param $query
     */
    public function scopeGetBlockRooms($query)
    {
        /*
         * Original query SELECT blocks.name, (SELECT COUNT(rooms.id) from rooms where rooms.block_id = blocks.id) as num_rooms from blocks
         */
        //return DB::query('SELECT blocks.name, (SELECT COUNT(rooms.id) from rooms where rooms.block_id = blocks.id) as num_rooms from blocks')->get();
    }

    /**
     * This scope will return how many rooms are available on a specified floor_id
     * @param $query
     * @param $floor_id
     */
    public function scopeGetBookedRooms($query, $floor_id)
    {
        return $query->join('bookings', 'rooms.id', '=', 'bookings.rooms_id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->where('floors.id', $floor_id)
            ->where('bookings.active', 1)
            ->get();
    }


}
