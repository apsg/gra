@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Misje
                        <a href="{{ route('games.create') }}" class="btn btn-primary pull-right">
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
                            @foreach($gamesGlobal as $game)
                                <a href="{{ route('game.play', $game) }}" target="_blank">
                                    {{ $game->title }}
                                </a>
                                <br/>
                            @endforeach
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
                                                {{ $game->title }}
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
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('game.play', $game) }}"
                                               class="btn btn-secondary mx-1"
                                               target="_blank"
                                            >
                                                <i class="fa fa-play"></i> Zagraj
                                            </a>
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
