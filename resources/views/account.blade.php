@extends('layouts.master')

@section('title', 'Strona Główna')


@section('content')
    <h1>Edycja konta</h1>
    <br>

    <form class="pure-form pure-form-stacked" action={{ route('account.save') }} method='get'>
        <fieldset>
            <legend>[{{ $loggedUser->username }}] - {{ $loggedUser->name }} {{ $loggedUser->surname }}</legend>
            <div>
                <label>Dane konta:</label>
                <input type="text" id="username" name="username" placeholder="username min:3|max:13"
                    value={{ $loggedUser->username }} readonly />
                <input type="password" id="newPassword" name="newPassword" placeholder="hasło min:3|max:28" />
            </div>

            <div>
                <label>Dane osobowe:</label>
                <input type="text" id="name" name="name" placeholder="imię min:3|max:13" value={{ $loggedUser->name }}
                    readonly />
                <input type="text" id="surname" name="surname" placeholder="nazwisko min:3|max:28"
                    value={{ $loggedUser->surname }} readonly />
            </div>

            <div>
                <label>Miejsce zamieszkania:</label>
                <input type="text" id="city" name="city" placeholder="Miasto min:3|max:30"
                    value={{ $loggedUser->city }} />
                <input type="text" id="street" name="street" placeholder="Ulica/nr/nr | min:3|max:30"
                    value={{ $loggedUser->street }} />
            </div>
            <br>
            <div>
                <label>Aktualne hasło:</label>
                <input type="password" id="password" name="password" placeholder="twoje hasło" />
            </div>

            <button type="submit" class="pure-button pure-button-primary">Edytuj</button>
        </fieldset>
    </form>

@endsection
