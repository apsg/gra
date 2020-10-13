<?php
namespace App\Domains\Games\Repositories;

use App\Domains\Games\Models\Game;
use App\Models\User;

class GamesRepository
{
    public function createBlank(User $user = null) : Game
    {
        return Game::create([
            'user_id' => $user->id ?? null,
            'title'   => 'Twoja gra',
        ]);
    }
}
