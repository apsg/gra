@extends('layouts.app')

@section('title', 'Gry')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Gra
                            <div class="pull-right d-inline-block">
                                <a href="{{ route('mission.create') }}"
                                   class="btn btn-outline-primary mx-1"
                                >
                                    <i class="fa fa-plus"></i> Dodaj nową misję
                                </a>
                                <a href="{{ route('game.play', $game) }}"
                                   class="btn btn-secondary mx-1"
                                   target="_blank"
                                >
                                    <i class="fa fa-play"></i> Zagraj
                                </a>
                                <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-backward"></i> Wróć
                                </a>
                                <livewire:remote-token :game="$game" :user="Auth::user()"></livewire:remote-token>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <livewire:game-edit :game="$game" :user="Auth::user()"></livewire:game-edit>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
