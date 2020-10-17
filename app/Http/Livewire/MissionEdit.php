<?php
namespace App\Http\Livewire;

use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Livewire\Component;

class MissionEdit extends Component
{
    /** @var Mission */
    public $mission;

    /** @var User */
    public $user;

    protected $rules = [
        'mission.title' => 'required|string|min:3',
    ];

    protected $listeners = [
        'changed' => 'reloadAnswers',
    ];

    public function mount(Mission $mission, User $user)
    {
        $this->mission = $mission->load('answers');
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.mission-edit');
    }

    public function save()
    {
        $this->mission->save();
    }

    public function getIsSavedProperty()
    {
        return $this->mission->isClean();
    }

    public function getIsCorrectProperty()
    {
        if ($this->mission->answers->count() == 0) {
            return false;
        }

        if ($this->mission->answers->where('is_correct')->count() < 1) {
            return false;
        }

        if ($this->mission->answers->where('text', '=', '')->count() > 0) {
            return false;
        }

        return true;
    }

    public function reloadAnswers()
    {
        $this->mission->load('answers');
    }

    public function addAnswer()
    {
        $this->mission->answers()->create([
            'text'       => '',
            'is_correct' => false,
        ]);
        $this->reloadAnswers();
    }
}
