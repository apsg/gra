<?php
namespace App\Domains\Games\Controllers;

use App\Domains\Games\Models\Avatar;
use App\Domains\Games\Models\Game;
use App\Domains\Games\RemoteTokenValidator;
use App\Domains\Games\Repositories\GamesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function demo()
    {
        $game = Game::global()->first();
        $avatars = Avatar::global()->get();

        return view('game')
            ->with(compact('game', 'avatars'));
    }

    public function preview(Game $game)
    {
        $avatars = Avatar::forUser(Auth::user())->get();

        return view('game')
            ->with(compact('game', 'avatars'));
    }

    public function index()
    {
        $gamesGlobal = Game::global()->get();
        $games = Auth::user()->games;

        return view('domains.games.index')->with(compact('gamesGlobal', 'games'));
    }

    public function create(GamesRepository $repository)
    {
        $game = $repository->createBlank(Auth::user());

        return redirect(route('games.edit', $game));
    }

    public function show(Game $game)
    {
        return view('domains.games.edit')->with(compact('game'));
    }

    public function delete(Game $game)
    {
        $game->delete();

        return back()->with('status', 'Usunięto pomyślnie');
    }

    public function remote(string $token)
    {
        $validator = new RemoteTokenValidator($token);
        $validator->validateAndUse();

        $avatars = Avatar::global()->get();

        return view('game')->with([
            'game'    => $validator->game(),
            'avatars' => $avatars,
        ]);
    }
}
