<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * This method will return user information with his assigned role
     */
    public function scopeGetUserRole($query)
    {
        return $query->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select(['roles.display_name', 'users.firstname', 'users.middlename', 'users.lastname', 'users.phone', 'users.email', 'users.address', 'role_user.created_at'])
            ->paginate(15);
    }
}
