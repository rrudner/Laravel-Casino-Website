@extends('layouts.master')

@section('title', '[A] Panel')


@section('animated-content')
    <h1>Użytkownicy</h1>
    <br>

    <div>
        <table class="my-table">
            <thead>
              <tr class="my-tr">
                <th class="my-th" scope="col">id</th>
                <th class="my-th" scope="col">Login</th>
                <th class="my-th" scope="col">Hasło</th>
                <th class="my-th" scope="col">Imię</th>
                <th class="my-th" scope="col">Nazwisko</th>
                <th class="my-th" scope="col">Miasto</th>
                <th class="my-th" scope="col">Ulica</th>
                <th class="my-th" scope="col">Portfel</th>
                <th class="my-th" scope="col">Wynik</th>
                <th class="my-th" scope="col">Rola</th>
                <th class="my-th" scope="col">Stworzony przez</th>
                <th class="my-th" scope="col">Data stworzenia</th>
                <th class="my-th" scope="col">Zmodyfikowany przez</th>
                <th class="my-th" scope="col">Data modyfikacji</th>
                <th class="my-th" scope="col">Edytuj</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="my-tr">
                        <th class="my-th" scope="row">{{ $user->id }}</th>
                        <td class="my-td">{{ $user->username }}</td>
                        <td class="my-td">ISTNIEJE</td>
                        <td class="my-td">{{ $user->name }}</td>
                        <td class="my-td">{{ $user->surname }}</td>
                        <td class="my-td">{{ $user->city }}</td>
                        <td class="my-td">{{ $user->street }}</td>
                        <td class="my-td">{{ $user->wallet }}</td>
                        <td class="my-td">{{ $user->result }}</td>
                        <td class="my-td">{{ $user->role }}</td>
                        <td class="my-td">{{ $user->created_by }}</td>
                        <td class="my-td">{{ $user->created_at }}</td>
                        <td class="my-td">{{ $user->updated_by }}</td>
                        <td class="my-td">{{ $user->created_at }}</td>
                        <td class="my-td">
                            <div style="text-align:center">
                            przycisk bedzie
                            </div>

                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

@endsection
