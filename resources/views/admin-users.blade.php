@extends('layouts.master')

@section('title', '[A] Panel')


@section('content')
    <h1>Użytkownicy</h1>
    <br>

    <div>
        <table class="my-table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Login</th>
                <th scope="col">Hasło</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Miasto</th>
                <th scope="col">Ulica</th>
                <th scope="col">Portfel</th>
                <th scope="col">Wynik</th>
                <th scope="col">Rola</th>
                <th scope="col">Stworzony przez</th>
                <th scope="col">Data stworzenia:</th>
                <th scope="col">Zmodyfikowany przez</th>
                <th scope="col">Data modyfikacji:</th>
                <th scope="col">Data usunięcia:</th>
                <th scope="col">Usuń</th>
                <th scope="col">Edytuj</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->username }}</td>
                        <td>🔑</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->street }}</td>
                        <td>{{ $user->wallet }}</td>
                        <td>{{ $user->result }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_by }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_by }}</td>
                        <td>{{ $user->updated_at }}</td>
                        @if ($user->deleted_at)
                            <td>{{$user->deleted_at}}</td>
                            <td><a href={{ route('adminUsersDelete', $user->id) }} class="pure-button pure-button-primary">♻️</a></td>
                            
                            @else
                            <td>✅</td>
                            <td><a href={{ route('adminUsersDelete', $user->id) }} class="pure-button pure-button-primary">🗑️</a></td>
                            @endif
                        
                        <td>
                            <a href={{ route('adminUsersEdit', $user->id) }} class="pure-button pure-button-primary">✨</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

@endsection
