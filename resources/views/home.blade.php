@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')
    <h1>Strona Główna</h1>

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
    <a href={{ route('game') }} class="pure-button pure-button-primary">Zagraj</a>
    <br>
    <a href={{ route('logout') }} class="pure-button pure-button-primary">Wyloguj się</a>





@endsection
