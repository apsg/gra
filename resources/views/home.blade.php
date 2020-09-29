@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Etap 1</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <sketch
                            image="{{ asset('images/missions/m1.jpg') }}"
                            :answers="[{'text': 'odp 1', is_correct: false},{'text': 'odp 2', is_correct: false},{'text': 'odp 3', is_correct: true}]"
                        ></sketch>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
