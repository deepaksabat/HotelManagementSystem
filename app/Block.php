<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Block extends Model
{
    protected $table = "blocks";

    /**
     * This scope will be used to show all rooms in according to their blocks
     * @param $query
     */
    public function scopeGetRooms($query)
    {
        /*
         * Original query SELECT blocks.name, (SELECT COUNT(rooms.id) from rooms where rooms.block_id = blocks.id) as num_rooms from blocks
         */
        return $query->where(function ($q) {
            return $q->from('rooms')->where('rooms.block_id', '=', 'blocks.id')->select('rooms.id')->count();
        })
            ->get();
    }
}
