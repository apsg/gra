@extends('layouts.game')

@section('content')
    <game
        image="{{ asset($mission->image) }}"
        :answers="{{ $mission->answers }}"
        avatar="{{ asset('images/mushroom.png') }}"
    ></game>
@endsection
