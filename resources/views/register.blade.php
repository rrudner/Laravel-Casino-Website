<html>

@extends('layouts.master')
@section('title', 'Rejestracja')

@section('animated-content')
    <form class="pure-form pure-form-stacked" action={{ route('register.save') }} method='get'>
        <fieldset>
            <legend>Zarejestruj się:</legend>
            <div>
                <label>Dane konta:</label>
                <input type="text" id="login" name="login" placeholder="login" />
                <input type="password" id="password" name="password" placeholder="hasło" />
            </div>

            <div>
                <label>Dane osobowe:</label>
                <input type="text" id="name" name="name" placeholder="imię" />
                <input type="text" id="surname" name="surname" placeholder="nazwisko" />
            </div>

            <div>
                <label>Miejsce zamieszkania:</label>
                <input type="text" id="city" name="city" placeholder="Miasto" />
                <input type="text" id="street" name="street" placeholder="Ulica nr/nr" />
            </div>


            <button type="submit" class="pure-button pure-button-primary">Zarejestruj się</button>
        </fieldset>
    </form>
@endsection

</html>
