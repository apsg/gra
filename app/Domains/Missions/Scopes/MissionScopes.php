<?php
namespace App\Domains\Missions\Scopes;

trait MissionScopes
{
    public function scopeGlobal($query)
    {
        return $query->whereNull('user_id');
    }
}
