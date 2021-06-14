<html>

@extends('layouts.master')
@section('title', 'Rejestracja')

@section('animated-content')
    <form class="pure-form pure-form-stacked" action={{ route('register.save') }} method='get'>
        <fieldset>
            <legend>Zarejestruj się:</legend>
            <div>
                <label>Dane konta:</label>
                <input type="text" id="login" name="login" placeholder="login min:3|max:13" />
                <input type="password" id="password" name="password" placeholder="hasło min:3|max:28" />
            </div>

            <div>
                <label>Dane osobowe:</label>
                <input type="text" id="name" name="name" placeholder="imię min:3|max:13" />
                <input type="text" id="surname" name="surname" placeholder="nazwisko min:3|max:28" />
            </div>

            <div>
                <label>Miejsce zamieszkania:</label>
                <input type="text" id="city" name="city" placeholder="Miasto min:3|max:30" />
                <input type="text" id="street" name="street" placeholder="Ulica/nr/nr | min:3|max:30" />
            </div>


            <button type="submit" class="pure-button pure-button-primary">Zarejestruj się</button>
        </fieldset>
    </form>

    @if (count($errors) > 0)
        <div>
            Rejestracja nie powiodła się.
        </div>
    @endif


@endsection

</html>
