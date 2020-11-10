<div class="d-inline-block">
    <a class="btn btn-primary"
       wire:click="generate"
       alt="Token dostępu zdalnego">
        <i class="fa fa-arrow-left"></i>
        Token
    </a>
    @if($token)
        <input class="form-control" type="text" disabled value="{{ $token ? $token->link() : '' }}"/>
    @endif
</div>
