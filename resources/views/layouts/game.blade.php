@extends('layouts.html')

@section('body', 'style=height:100%;')

@section('app')
    <div id="app" class="w-100 h-100">
        <div class="game w-100 h-100">
            @yield('content')
        </div>
    </div>
@endsection
