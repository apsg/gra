@extends('layouts.welcome')

@section('title', 'Misja:Sprzymierzeniec')

@section('content')
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        <h1 class="text-center color-red font-mono font-weight-bold">Misja:sprzymierzeniec</h1>
    </div>

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>

                <div class="ml-12">
                    <div class="mt-2  text-sm">
                        Misja:sprzymierzeniec to gra wspomagająca rozumienie zniekształceń poznawczych.
                        To zbiór misji-poziomów...
                        <br/>
                        Forma gry oraz możliwość sterowania za pomocą myszki, klawiatury lub gamepada sprawiają, że
                        jest ona atrakcyjna i angażująca dla młodych ludzi.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary">Panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 btn btn-primary">Zarejestruj się</a>
                    @endif
                @endif
            </div>

            <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm">
                        <a href="{{ url('demo') }}" class="btn btn-secondary">Zobacz demo</a>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                        <path
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        abc
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">

    </div>
@endsection
