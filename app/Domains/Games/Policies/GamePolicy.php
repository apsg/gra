<?php
namespace App\Domains\Games\Policies;

use App\Domains\Games\Models\Game;
use App\Helpers\PermissionHelper;
use App\Helpers\RoleHelper;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Game $game)
    {
        if ($game->user_id === null) {
            return true;
        }

        return $game->user_id == $user->id;
    }

    public function create(User $user)
    {
        if ($user->hasRole(RoleHelper::SUBSCRIBED)) {
            return true;
        }

        if ($user->games()->count() < RoleHelper::FREE_GAMES) {
            return true;
        }

        return $user->can(PermissionHelper::GAMES_CREATE);
    }

    public function update(User $user, Game $game)
    {
        return $user->id == $game->user_id;
    }

    public function delete(User $user, Game $game)
    {
        return $user->id == $game->user_id;
    }

    public function restore(User $user, Game $game)
    {
        return $user->id == $game->user_id;
    }

    public function forceDelete(User $user, Game $game)
    {
        return $user->id == $game->user_id;
    }
}
