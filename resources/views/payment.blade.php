@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')

    <h1>Płatności</h1>

    <form class="pure-form pure-form-stacked" action={{ route('login.auth') }} method='get'>
        <fieldset>
            <select name="nazwa">
                <option>Tu wpisz pierwszą możliwość</option>
                <option>Tu wpisz drugą możliwość</option>
                (...)
            </select>
            <button type="submit" class="pure-button pure-button-primary">Zaloguj się</button>
        </fieldset>
    </form>

@endsection
