<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    /**
     * This scope will return retn for specified room
     * @param $query
     * @param $id
     */
    public function scopeGetRent($query, $id)
    {
        return $query->where('id', $id)->where('active', 1)
            ->select('rent')->first();

    }
}
