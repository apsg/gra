@extends('layouts.game')

@section('title', 'Gra')

@section('content')
    <game
        :missions="{{ $game->missions }}"
        :avatars="{{ $avatars }}"
        :id="{{ $game->id }}"
    ></game>
@endsection
