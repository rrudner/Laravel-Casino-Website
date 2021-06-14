@extends('layouts.master')

@section('title', '[A] Role')


@section('animated-content')
    <h1>Gry</h1>
    <br>


    <div style="overflow-x:auto;">
        <table class="my-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nazwa Roli:</th>
                    <th>Data utworzenia:</th>
                    <th>Data aktualizacji:</th>
                    <th>Data usunięcia:</th>
                    <th>Usuń/Przywróć</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        @if ($role->deleted_at)
                            <td>{{ $role->deleted_at }}</td>
                            <td><a href={{ route('adminRolesDelete', $role->id) }}
                                    class="pure-button pure-button-primary">♻️</a></td>

                        @else
                            <td>✅</td>
                            <td><a href={{ route('adminRolesDelete', $role->id) }}
                                    class="pure-button pure-button-primary">🗑️</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $roles->links() }}

@endsection
