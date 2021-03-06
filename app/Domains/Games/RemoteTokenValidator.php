<?php
namespace App\Domains\Games;

use App\Domains\Games\Exceptions\TokenInvalidException;
use App\Domains\Games\Models\Game;
use App\Domains\Games\Models\RemoteToken;
use Carbon\Carbon;

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

    public function validateAndUse()
    {
        $this->validate();
        $this->token->use();
    }

    public function game() : Game
    {
        return $this->token->game;
    }
}
