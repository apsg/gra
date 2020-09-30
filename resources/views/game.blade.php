@extends('layouts.game')


@section('content')
    <game
        :missions="{{ $game->missions }}"
        :avatars="[]"
        :id="{{ $game->id }}"
    ></game>
@endsection
