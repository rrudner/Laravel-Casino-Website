@extends('layouts.master')

@section('title', 'Strona Główna')


@section('animated-content')

    <h1>Płatności</h1>

    <form class="pure-form pure-form-stacked" action={{ route('payment.deposit') }} method='get'>
        <fieldset>
            <label for="amount">Wybierz kwotę:</label>
            <select id="amount" name="amount">
                <option>5</option>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
                <option>250</option>
                <option>500</option>
                <option>1000</option>
            </select>
            <button type="submit" class="pure-button pure-button-primary">Wpłać</button>
        </fieldset>
    </form>
    <br>
    <a href={{ route('payment.withdraw') }} class="pure-button pure-button-primary">Wypłać wszystko</a>

@endsection
