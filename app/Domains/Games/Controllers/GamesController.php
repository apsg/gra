<?php
namespace App\Domains\Games\Controllers;

use App\Domains\Games\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function preview(Game $game)
    {
        return view('game')->with(compact('game'));
    }

    public function index()
    {
        $gamesGlobal = Game::global()->get();
        $games = Auth::user()->games;

        return view('domains.games.index')->with(compact('gamesGlobal', 'games'));
    }
}
