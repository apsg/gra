<?php
namespace App\Domains\Games\Exceptions;

class TokenInvalidException extends \Exception
{
    protected $code = 403;

    protected $message = 'Your token is invalid, probably expired';

    public function render()
    {
        return abort(403, $this->message);
    }
}
