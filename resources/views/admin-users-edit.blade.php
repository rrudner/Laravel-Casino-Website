@extends('layouts.master')

@section('title', '[A] Panel')


@section('content')
    <h1>Edycja użytkownika</h1>
    <br>

    <form class="pure-form pure-form-stacked" action={{ route('adminUsersEdit.save', $editedUser->id) }} method='get'>
        <fieldset>
            <legend>[{{$editedUser->username}}] - {{$editedUser->name}} {{$editedUser->surname}}</legend>
            <div>
                <label>ID:</label>
                <input type="text" id="id" name="id" placeholder="id" value={{$editedUser->id}} readonly/>
            </div>
            <div>
                <label>Dane konta:</label>
                <input type="text" id="login" name="login" placeholder="login" value={{$editedUser->username}} />
                <input type="password" id="password" name="password" placeholder="hasło" />
            </div>

            <div>
                <label>Dane osobowe:</label>
                <input type="text" id="name" name="name" placeholder="imię" value={{$editedUser->name}} />
                <input type="text" id="surname" name="surname" placeholder="nazwisko" value={{$editedUser->surname}} />
            </div>

            <div>
                <label>Miejsce zamieszkania:</label>
                <input type="text" id="city" name="city" placeholder="Miasto" value= {{$editedUser->city}} />
                <input type="text" id="street" name="street" placeholder="Ulica nr/nr" value= {{$editedUser->street}} />
            </div>

            <div>
                @if ($editedUser->id == $loggedUser->id)
                    Nie możesz zmienić sobie sam roli.
                @else
                <label for="role">Rola:</label>
                <select id="role" name="role">
                    @foreach ($roles as $role)
                    <option value= {{$role->id}} 
                        @if($role->id == $editedUser->role)
                        selected
                        @endif
                        > {{$role->name}} </option>
                    @endforeach
                </select>
                @endif
            </div>
            <button type="submit" class="pure-button pure-button-primary">Edytuj</button>
        </fieldset>
    </form>

@endsection
