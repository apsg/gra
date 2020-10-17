<div>
    <form wire:submit.prevent="save">
        @if($this->is_saved)
            <p class="color-green"><i class="fa fa-save"></i> Zapisano zmiany</p>
        @else
            <p class=""><i class="fa fa-ellipsis-h"></i> zapisuję</p>
        @endif

        <div class="form-group">
            <div class="form-group">
                <label class="font-weight-bold">Nazwa misji</label>
                <p>Nazwa misji pozwoli Ci ją w przyszłości łatwo odnaleźć, odróżnić i dodać do gry.</p>
                <input class="form-control"
                       type="text"
                       name="title"
                       wire:model.debounce.500ms="mission.title"
                       wire:keyup.debounce.1000ms="save">
                @error('mission.title') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <h5>Odpowiedzi:</h5>
            <div class="alert @if($this->is_correct) alert-success @else alert-danger @endif">
                @if($this->is_correct)
                    <i class="fa fa-check-circle"></i>
                    Wszystko w porządku.
                @else
                    <i class="fa fa-exclamation-circle"></i>
                    Pamiętaj, by dodać przynajmniej jedną odpowiedź oraz oznaczyć co najmniej jedną z nich jako
                    prawidłową. Nie zapomnij też o treści odpowiedzi.
                @endif
            </div>
            @foreach($mission->answers as $answer)
                <livewire:answer-edit :answer="$answer" :key="uniqid()"></livewire:answer-edit>
            @endforeach
            <button class="btn btn-success btn-sm" wire:click.prevent="addAnswer">
                <i class="fa fa-plus"></i> Dodaj kolejną odpowiedź
            </button>
        </div>
    </form>
</div>
