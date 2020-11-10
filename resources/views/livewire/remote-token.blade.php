<div class="d-inline-block">
    <div class="d-flex">
        <a class="btn btn-primary"
           wire:click="generate"
           alt="Token dostępu zdalnego">
            <i class="fa fa-laptop-house"></i>
            Token
        </a>
        @if($token)
            <input class="form-control"
                   type="text"
                   disabled
                   value="{{ $token ? $token->link() : '' }}" />
        @endif
    </div>
</div>
