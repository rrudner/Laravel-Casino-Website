@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')
    <h1>Strona Główna</h1>

    @if (isset($user))
        Jesteś zalogowany jako:
        <br>
        <h2>
            {{ $user->name }}
            {{ $user->surname }}
        </h2>
        <br>
        <h1>
            Rola:
            {{ $role }}
        </h1>
        <br>
        <a href={{ 'logout' }} class="pure-button pure-button-primary">Wyloguj się</a>
    @else
        <a href={{ 'login' }} class="pure-button pure-button-primary">zaloguj się</a>
        <a href={{ 'register' }} class="pure-button pure-button-primary">zarejestruj się</a>
    @endif




@endsection
