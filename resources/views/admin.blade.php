@extends('layouts.master')

@section('title', '[A] Panel')


@section('animated-content')
    <h1>Panel Administratora</h1>
    <br>

    <a href={{ route('adminPayments') }} class="pure-button pure-button-primary">Wpłaty</a>
    <a href={{ route('adminUsers') }} class="pure-button pure-button-primary">Użytkownicy</a>
    <a href={{ route('adminGames') }} class="pure-button pure-button-primary">Gry</a>
    <a href={{ route('adminRoles') }} class="pure-button pure-button-primary">Role</a>

@endsection
