@extends('layouts.master')

@section('title', '[A] Wpłaty')


@section('animated-content')
    <h1>Wpłaty/Wypłaty</h1>
    <br>


    <div style="overflow-x:auto;">
        <table class="my-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Użytkownik</th>
                    <th>Kwota</th>
                    <th>Wpłata/Wypłata</th>
                    <th>Data utworzenia:</th>
                    <th>Stworzona przez</th>
                    <th>Data aktualizacji:</th>
                    <th>Zaktualizowana przez</th>
                    <th>Data usunięcia</th>
                    <th>Usuń/Przywróć</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->id }}</th>
                        <td>{{ $payment->user_id }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>
                            @if ($payment->withdraw)
                                💸WYPŁATA💸
                            @else
                                💰WPŁATA💰
                            @endif
                        </td>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ $payment->created_by }}</td>
                        <td>{{ $payment->updated_at }}</td>
                        <td>{{ $payment->updated_by }}</td>

                        @if ($payment->deleted_at)
                            <td>{{ $payment->deleted_at }}</td>
                            <td><a href={{ route('adminPaymentsDelete', $payment->id) }}
                                    class="pure-button pure-button-primary">♻️</a></td>

                        @else
                            <td>✅</td>
                            <td><a href={{ route('adminPaymentsDelete', $payment->id) }}
                                    class="pure-button pure-button-primary">🗑️</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $payments->links() }}

@endsection
