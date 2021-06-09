<html>

@extends('layouts.master')
@section('title', 'Logowanie')

@section('animated-content')
    <form class="pure-form pure-form-stacked" action={{ route('login.auth') }} method='get'>
        <fieldset>
            <legend>Zaloguj się:</legend>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" placeholder="login" />
            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" placeholder="hasło" />
            <button type="submit" class="pure-button pure-button-primary">Zaloguj się</button>
        </fieldset>
        Jeżeli nie posiadasz jeszcze konta:
        <br>
        <a href={{ 'register' }}>zarejstruj się. </a>
    </form>
@endsection

</html>
