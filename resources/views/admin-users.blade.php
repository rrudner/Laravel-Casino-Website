@extends('layouts.master')

@section('title', '[A] Panel')


@section('content')
    <h1>Użytkownicy</h1>
    <br>

    <div style="overflow-x:auto;">
        <table class="my-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Login</th>
                    <th>Hasło</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Miasto</th>
                    <th>Ulica</th>
                    <th>Portfel</th>
                    <th>Wynik</th>
                    <th>Rola</th>
                    <th>Stworzony przez</th>
                    <th>Data stworzenia:</th>
                    <th>Zmodyfikowany przez</th>
                    <th>Data modyfikacji:</th>
                    <th>Data usunięcia:</th>
                    <th>Usuń</th>
                    <th>Edytuj</th>
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
                            <td>{{ $user->deleted_at }}</td>
                            <td><a href={{ route('adminUsersDelete', $user->id) }}
                                    class="pure-button pure-button-primary">♻️</a></td>

                        @else
                            <td>✅</td>
                            <td><a href={{ route('adminUsersDelete', $user->id) }}
                                    class="pure-button pure-button-primary">🗑️</a></td>
                        @endif

                        <td>
                            <a href={{ route('adminUsersEdit', $user->id) }}
                                class="pure-button pure-button-primary">✨</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
