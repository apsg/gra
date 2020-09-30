<?php
namespace App\Domains\Games\Controllers;

use App\Domains\Games\Models\Game;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function show(Game $game)
    {
        return view('game')->with(compact('game'));
    }
}
