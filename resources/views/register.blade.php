<html>

@extends('layouts.master')
@section('title', 'Rejestracja')

@section('animated-content')
    <form class="pure-form pure-form-stacked">
        <fieldset>
            <legend>Zarejestruj się:</legend>
            <div>
                <label>Dane konta:</label>
                <input type="email" id="email" placeholder="e-mail" />
                <input type="text" id="login" placeholder="login" />
                <input type="password" id="password" placeholder="hasło" />
            </div>

            <div>
                <label>Dane osobowe:</label>
                <input type="text" id="name" placeholder="imię" />
                <input type="text" id="surname" placeholder="nazwisko" />
                <input type="text" id="pesel" placeholder="PESEL" />
            </div>

            <div>
                <label>Miejsce zamieszkania:</label>
                <input type="text" id="country" placeholder="Kraj" />
                <input type="text" id="city" placeholder="Miasto" />
                <input type="text" id="street" placeholder="Ulica nr/nr" />
            </div>


            <button type="submit" class="pure-button pure-button-primary">Zarejestruj się</button>
        </fieldset>
    </form>
@endsection

</html>
