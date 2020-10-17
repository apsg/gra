@extends('layouts.welcome')

@section('title', 'O grze')

@section('content')
    <h2 class="text-center color-red font-mono font-weight-bold mb-5 mt-5">Misja:Sprzymierzeniec</h2>

    <h3 class="color-red font-mono font-weight-bold">1. Dodawaj misje</h3>
    <p class="color-white">Możesz łatwo dodawać własne misje do gry! Załaduj zdjęcie, wpisz odpowiedzi i zaznacz, która
        z nich jest
        prawidłowa. I już! Nowa misja gotowa!
    </p>
    <p class="color-white">Nie masz pomysłu na własne misje? To nic, przygotowaliśmy dla
        Ciebie {{ \App\Domains\Missions\Models\Mission::global()->count() }} misji, które możesz wykorzystać w swoich
        grach.
    </p>

    <h3 class="color-red font-mono font-weight-bold mt-5">2. Twórz gry</h3>
    <p class="color-white">Z całego zestawu dostępnych misji - zarówno Twoich, jak i przygotowanych przez nas, możesz
        łatwo złożyć własną grę. Wpisz nazwę, kliknij aby wybrać misje i gotowe. Twoja gra w kilka sekund.
    </p>

    <h3 class="color-red font-mono font-weight-bold mt-5">3. Atrakcyjność</h3>

    <h5 class="text-center color-red font-mono font-weight-bold">Sterowanie</h5>
    <p class="text-center color-white">Gamepad? Myszka? A może klawiatura? Gracz sam może wybrać czym najłatwiej mu się
        steruje.</p>
    <div class="d-flex justify-content-around">
        <img src="{{ asset('images/gamepad.svg') }}" height="140">
        <img src="{{ asset('images/keyboard.svg') }}" height="140">
        <img src="{{ asset('images/mouse.svg') }}" height="140">
    </div>

    <h5 class="text-center color-red font-mono font-weight-bold mt-5">Awatary</h5>
    <p class="text-center color-white">Czym chcesz dzisiaj grać? Mario czy statkiem kosmicznym?</p>
    <div class="d-flex justify-content-around">
        <img src="{{ asset('images/avatars/ufo.svg') }}" height="140">
        <img src="{{ asset('images/avatars/mushroom.png') }}" height="140">
    </div>

    <h5 class="text-center color-red font-mono font-weight-bold mt-5">Formuła gry</h5>
    <p class="text-center color-white">Goń odpowiedzi i zdobywaj punkty!</p>
    <div class="d-flex justify-content-around">
        <img src="{{ asset('images/coin.gif') }}" height="140">
    </div>

    <h3 class="color-red font-mono font-weight-bold mt-5">4. Dostosuj grę do gracza</h3>
    <p class="color-white">Twoje gry możesz przygotować specjalnie dla konkretnego gracza. Ułóż zestaw misji
        odpowiadający jego potrzebom oraz dostosuj dla niego poziom trudności. Możesz też wybrać z jakiego sterowania
        może korzystać.
    </p>
    <p class="text-center">
        <img src="{{asset('images/difficulty.png')}}">
    </p>

    <h3 class="color-red font-mono font-weight-bold mt-5">5. Ile monet to kosztuje?</h3>
    <p class="color-white">Predefiniowane misje i gry będą dostępne za darmo. Zawsze. Wystarczy się zarejestrować.
        W ramach darmowego konta możesz też utworzyć pewną ograniczoną liczbę własnych misji i gier.
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <td></td>
            <td class="text-center">
                <img src="{{ asset('images/avatars/mushroom.png') }}" height="80">
                <h3 class="text-center color-red font-mono font-weight-bold mt-3">Konto darmowe</h3>

            </td>
            <td class="text-center">
                <img src="{{ asset('images/avatars/mario.png') }}" height="80">
                <h3 class="text-center color-red font-mono font-weight-bold mt-3">Konto płatne</h3>
            </td>
        </tr>
        </thead>
        <tbody>
        <tr class="color-white font-mono text-center">
            <td class="font-weight-bold">Własne poziomy:</td>
            <td>3</td>
            <td>Dowolnie</td>
        </tr>
        <tr class="color-white font-mono text-center">
            <td class="font-weight-bold">Własne gry:</td>
            <td>1</td>
            <td>Dowolnie</td>
        </tr>
        <tr class="color-white font-mono text-center">
            <td class="font-weight-bold">Własne awatary:</td>
            <td>
                <i class="fa fa-times color-red"></i> nie
            </td>
            <td>
                <i class="fa fa-check color-green"></i> tak
            </td>
        </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-around mt-5">
        <a class="btn btn-outline-primary" href="{{ route('register') }}">Załóż konto</a>
        <a class="btn btn-outline-primary" href="{{ route('subscribe') }}">Kup pełen dostęp</a>
    </div>


    <div class="text-white small mt-5">
        Icons made by <a href="https://www.flaticon.com/free-icon/mouse_702640" title="Good Ware">Good Ware</a> from <a
            href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
    </div>
@endsection
