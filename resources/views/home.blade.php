@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')
    <h1>Strona Główna</h1>

    @if (isset($loggedUser))
        Jesteś zalogowany jako:
        <br>
        <h2>
            {{ $loggedUser->name }}
            {{ $loggedUser->surname }}
        </h2>
        <br>
        <h1>
            Rola:
            {{ $loggedRole }}
        </h1>
        <br>
        <a href={{ route('logout') }} class="pure-button pure-button-primary">Wyloguj się</a>
    @else
        <a href={{ route('login') }} class="pure-button pure-button-primary">zaloguj się</a>
        <a href={{ route('register') }} class="pure-button pure-button-primary">zarejestruj się</a>
    @endif




@endsection
