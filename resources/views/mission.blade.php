@extends('layouts.game')

@section('content')
    <mission
        image="{{ asset($mission->image) }}"
        :answers="{{ $mission->answers }}"
        avatar="{{ asset('images/mushroom.png') }}"
    ></mission>
@endsection
