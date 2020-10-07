@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Misje
                        <a href="{{ route('mission.create') }}" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i> Dodaj nową misję
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-info">
                            <h3>Misje globalne dostępne dla ciebie:</h3>
                            @foreach($missionsGlobal as $mission)
                                <a href="{{ route('mission.preview', $mission) }}" target="_blank">
                                    {{ $mission->title }}
                                </a>
                                <br/>
                            @endforeach
                        </div>
                        <div class="alert">
                            <h3>Twoje misje:</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Opcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($missions as $mission)
                                    <tr>
                                        <td>
                                            <a href="{{ route('mission.preview', $mission) }}" target="_blank">
                                                {{ $mission->title }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mission.delete', $mission) }}"
                                                  method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('mission.edit', $mission) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
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
