@extends('layouts.master')

@section('title', 'Sprawdź swoje szczęście')

@section('coingame')
    <link rel="stylesheet" href="{{ config('app.url') }}/resources/css/coingame.css">
    <script type="text/javascript" src="{{ config('app.url') }}/resources/js/coingame.js" defer></script>
@endsection

@section('animated-content')
    <h1>Witaj</h1>
    <h2>
        {{ $loggedUser->name }}
        {{ $loggedUser->surname }}
    </h2>

    <div class='container'>
        <div id="coin">
            <div id="heads" class="heads"></div>
            <div id="tails" class="tails"></div>
        </div>
        <div class="pure-form pure-form-stacked">
            <label for="amount">Kwota:</label><br>
            @if (session('bet'))
                <input type="number" id="amount" name="amount" value={{ session('bet') }}><br>
            @else
                <input type="number" id="amount" name="amount" value={{ round($loggedWallet / 20) }}><br>
            @endif
        </div>

        <table>
            <td><button id="flipTails" class="pure-button pure-button-primary">Reszka</button>
            <td><button id="flipHeads" class="pure-button pure-button-primary">Orzeł</button>
        </table>
    </div>




@endsection
