<div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox"
                       aria-label="Checkbox for following text input"
                       value="1"
                       wire:model="answer.is_correct"
                       wire:change.debounce.500ms="save"
                >
            </div>
        </div>
        <input type="text"
               class="form-control"
               wire:model="answer.text"
               wire:keyup.debounce.500ms="save"
        >
        <div class="input-group-append">
            <div class="input-group-text">
                <a href="#" class="color-red" wire:click.prevent="delete">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
    </div>
</div>
