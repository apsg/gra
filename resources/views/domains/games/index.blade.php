@extends('layouts.app')

@section('title', 'Gry')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>Gry</div>
                        <a href="{{ route('games.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Dodaj nową grę
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-info">
                            <h3>Gry globalne dostępne dla ciebie:</h3>
                            <ul>
                                @foreach($gamesGlobal as $game)
                                    <li>
                                        <a href="{{ route('game.play', $game) }}" target="_blank">
                                            {{ $game->title }} (Misji: {{ $game->missions()->count() }})
                                        </a>
                                        <livewire:remote-token :game="$game" :user="Auth::user()"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="alert">
                            <h3>Twoje gry:</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Opcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($games as $game)
                                    <tr>
                                        <td>
                                            <a href="{{ route('games.edit', $game) }}">
                                                {{ $game->title }} (Misji: {{ $game->missions()->count() }})
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('games.delete', $game) }}"
                                                  method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('games.edit', $game) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i></a>                                            </a>
                                            <a href="{{ route('game.play', $game) }}"
                                               class="btn btn-secondary mx-1"
                                               target="_blank"
                                            >
                                                <i class="fa fa-play"></i> Zagraj
                                            </a>
                                            <livewire:remote-token :game="$game" :user="Auth::user()"/>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
