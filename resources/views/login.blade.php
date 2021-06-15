<html>
<link rel="icon" href="{{ config('app.url') }}/resources/css/favicon.png" type="image/x-icon" />
@extends('layouts.master')
@section('title', 'Logowanie')

@section('animated-content')
    <form class="pure-form pure-form-stacked" action={{ route('login.auth') }} method='get'>
        <fieldset>
            <legend>Zaloguj się:</legend>
            <label for="username">Login</label>
            <input type="text" id="username" name="username" placeholder="username" />
            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" placeholder="hasło" />
            <button type="submit" class="pure-button pure-button-primary">Zaloguj się</button>
        </fieldset>
        Jeżeli nie posiadasz jeszcze konta:
        <br>
        <a href={{ route('register') }}>zarejstruj się. </a>
    </form>
@endsection

</html>
