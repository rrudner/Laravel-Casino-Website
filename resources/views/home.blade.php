@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')
    <p>Strona Główna</p>

    @if (isset($user->username))
        Jesteś zalogowany jako:
        <br>
        <h1>{{ $user->username }}</h1>
        <br>
        <a href={{ 'logout' }} class="pure-button pure-button-primary">Wyloguj się</a>
    @else
        <a href={{ 'login' }} class="pure-button pure-button-primary">zaloguj się</a>
        <a href={{ 'register' }} class="pure-button pure-button-primary">zarejestruj się</a>
    @endif




@endsection
