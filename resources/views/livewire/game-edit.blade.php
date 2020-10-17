<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label class="font-weight-bold">Nazwa gry</label>
            <p>Nazwa gry pozwoli Ci ją w przyszłości łatwo odnaleźć, odróżnić i uruchomić.
                Warto, by pozwalała na szybką identyfikację zbioru misji lub przeznaczenia, np. "gra dla Maćka"
                lub "typowe zniekształcenia". Pamiętaj, aby nie podawać tutaj żadnych danych osobowych!</p>
            <input class="form-control"
                   type="text"
                   name="title"
                   wire:model.debounce.500ms="game.title"
                   wire:change.debounce.1000ms="save">
            @error('game.title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <h3>Wybierz misje:</h3>
        @foreach($missions as $mission)

            <a href="#" class="p-3 card m-1 {{ $game->hasMission($mission) ? "selected alert-success" : '' }}"
                 wire:click.prevent="toggle({{$mission->id}})"
            >
                {{$mission->title}}
            </a>
        @endforeach

    </form>
</div>
