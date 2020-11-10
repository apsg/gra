<?php
namespace App\Domains\Games;

use App\Domains\Games\Exceptions\TokenInvalidException;
use App\Domains\Games\Models\Game;
use App\Domains\Games\Models\RemoteToken;

class RemoteTokenValidator
{
    /** @var RemoteToken */
    public $token;

    public function __construct(string $token)
    {
        $this->token = RemoteToken::where([
            'token' => $token,
        ])->firstOrFail();
    }

    public function validate()
    {
        if (!$this->token->isValid()) {
            throw new TokenInvalidException();
        }
    }

    public function game() : Game
    {
        return $this->token->game;
    }
}
