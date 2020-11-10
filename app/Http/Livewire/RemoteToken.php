<?php
namespace App\Http\Livewire;

use App\Domains\Games\Models\Game;
use App\Domains\Games\Models\RemoteToken as RemoteTokenModel;
use App\Domains\Games\Repositories\RemoteTokenRepository;
use App\Models\User;
use Livewire\Component;

class RemoteToken extends Component
{
    /**
     * @var Game|mixed
     */
    public $game;
    /**
     * @var User|mixed
     */
    public $user;

    /** @var RemoteTokenModel|null */
    public $token;

    public function render()
    {
        return view('livewire.remote-token');
    }

    public function mount(Game $game, User $user)
    {
        $this->game = $game;
        $this->user = $user;
    }

    public function generate()
    {
        $this->token = app(RemoteTokenRepository::class)
            ->create($this->user, $this->game, 2);
    }
}
