@extends('layouts.game')

@section('content')
    <game
        image="{{ asset('images/missions/m1.jpg') }}"
        :answers="[{'text': 'odp 1', is_correct: false},{'text': 'odp 2', is_correct: false},{'text': 'odp 3', is_correct: true}]"
    ></game>
@endsection
