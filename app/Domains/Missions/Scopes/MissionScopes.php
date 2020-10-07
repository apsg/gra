<?php
namespace App\Domains\Missions\Scopes;

use App\Models\User;

trait MissionScopes
{
    public function scopeGlobal($query)
    {
        return $query->whereNull('user_id');
    }

    public function scopeOfUser($query, User $user)
    {
        return $query->where('user_id', '=', $user->id);
    }
}
