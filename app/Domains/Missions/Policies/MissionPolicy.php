<?php
namespace App\Domains\Missions\Policies;

use App\Domains\Missions\Models\Mission;
use App\Helpers\PermissionHelper;
use App\Helpers\RoleHelper;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Mission $mission)
    {
        if ($mission->user_id === null) {
            return true;
        }

        return $mission->user_id == $user->id;
    }

    public function create(User $user)
    {
        if ($user->missions()->count() < RoleHelper::FREE_MISSIONS) {
            return true;
        }

        return $user->can(PermissionHelper::MISSIONS_CREATE);
    }

    public function update(User $user, Mission $mission)
    {
        return $user->id == $mission->user_id;
    }

    public function delete(User $user, Mission $mission)
    {
        return $user->id == $mission->user_id;
    }

    public function restore(User $user, Mission $mission)
    {
        return $user->id == $mission->user_id;
    }

    public function forceDelete(User $user, Mission $mission)
    {
        return $user->id == $mission->user_id;
    }
}
