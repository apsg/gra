@extends('layouts.game')

@section('title', 'Misja ' . $mission->title )

@section('content')
    <mission
        image="{{ $mission->imageUrl() }}"
        :answers="{{ $mission->answers }}"
        avatar="{{ asset('images/mushroom.png') }}"
    ></mission>
@endsection
