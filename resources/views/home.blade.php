@extends('layouts.master')

@section('title', 'Page Title')


@section('animated-content')
    <p>Strona Główna</p>

    <a href={{ 'login' }} class="pure-button pure-button-primary">zaloguj się</a>
    <a href={{ 'register' }} class="pure-button pure-button-primary">zarejestruj się</a>

@endsection
