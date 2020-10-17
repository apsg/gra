@extends('layouts.app')

@section('title', 'Edytuj misję')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Misja #{{ $mission->id }}
                            <div class="pull-right d-inline-block">
                                <a href="{{ route('mission.create') }}"
                                   class="btn btn-outline-primary mx-1"
                                >
                                    <i class="fa fa-plus"></i> Dodaj nową misję
                                </a>
                                <a href="{{ route('mission.preview', $mission) }}"
                                   class="btn btn-secondary mx-1"
                                   target="_blank"
                                >
                                    <i class="fa fa-eye"></i> Podgląd
                                </a>
                                <a href="{{ route('mission.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-backward"></i> Wróć
                                </a>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <livewire:mission-edit :mission="$mission" :user="Auth::user()"></livewire:mission-edit>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
