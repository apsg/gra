<?php

namespace App\Http\Livewire;

use App\Domains\Missions\Models\Answer;
use Livewire\Component;

class AnswerEdit extends Component
{
    /** @var Answer */
    public $answer;

    protected $rules = [
        'answer.is_correct' => 'boolean',
        'answer.text'       => 'string|min:3',
    ];

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function render()
    {
        return view('livewire.answer-edit');
    }

    public function save()
    {
        if ($this->answer->isClean()) {
            return;
        }

        $this->answer->save();
        $this->emitUp('changed');
    }

    public function delete()
    {
        $this->answer->delete();
        $this->emitUp('changed');
    }
}
