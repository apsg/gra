<div>
    <a class="btn btn-primary"
       wire:click="generate"
       alt="Token dostępu zdalnego">
        <i class="fa fa-arrow-left"></i>
        Token
    </a>
    <input type="text" disabled value="{{ $token ? $token->link() : '' }}"/>
</div>
