@extends('layouts.game')

@section('content')
    <mission
        image="{{ $mission->imageUrl() }}"
        :answers="{{ $mission->answers }}"
        avatar="{{ asset('images/mushroom.png') }}"
    ></mission>
@endsection
