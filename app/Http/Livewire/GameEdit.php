<?php

namespace App\Http\Livewire;

use App\Domains\Games\Models\Game;
use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class GameEdit extends Component
{
    /** @var Game */
    public $game;

    /** @var User */
    public $user;

    protected $rules = [
        'game.title' => 'required|string',
    ];

    /** @var Collection|Mission[] */
    public $missions;

    public function mount(Game $game, User $user)
    {
        $this->game = $game;
        $this->user = $user;

        $this->missions = Mission::forUser($user)
            ->orderBy('title')
            ->get();
    }

    public function render()
    {
        return view('livewire.game-edit');
    }

    public function save()
    {
        $this->game->save();
    }

    public function toggle(int $missionId)
    {
        if ($this->game->hasMission($missionId)) {
            $this->game->missions()->detach($missionId);
        } else {
            $this->game->missions()->attach($missionId);
        }
        $this->game->refresh();
    }
}
