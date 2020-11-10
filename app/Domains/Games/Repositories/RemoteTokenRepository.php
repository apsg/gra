<?php
namespace App\Domains\Games\Repositories;

use App\Domains\Games\Models\Game;
use App\Domains\Games\Models\RemoteToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RemoteTokenRepository
{
    public function create(User $user, Game $game, int $expirationHours = null) : RemoteToken
    {
        $token = RemoteToken::firstOrCreate([
            'user_id' => $user->id,
            'game_id' => $game->id,
        ], [
            'token' => '',
        ]);

        $token->update([
            'token'           => Str::random(),
            'expires_at'      => null,
            'valid_for_hours' => $expirationHours,
        ]);

        return $token;
    }
}
