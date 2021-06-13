@extends('layouts.master')

@section('title', '[A] Wpłaty')


@section('animated-content')
    <h1>Wpłaty/Wypłaty</h1>
    <br>


    <div>
        <table class="my-table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Użytkownik</th>
                <th scope="col">Kwota</th>
                <th scope="col">Wpłata/Wypłata</th>
                <th scope="col">Data utworzenia:</th>
                <th scope="col">Stworzona przez</th>
                <th scope="col">Data aktualizacji:</th>
                <th scope="col">Zaktualizowana przez</th>
                <th scope="col">Data usunięcia</th>
                <th scope="col">Usuń/Przywróć</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->id }}</th>
                        <td>{{ $payment->user_id }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>
                            @if($payment->withdraw)
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
                            <td>{{$payment->deleted_at}}</td>
                            <td><a href={{ route('adminPaymentsDelete', $payment->id) }} class="pure-button pure-button-primary">♻️</a></td>
                            
                            @else
                            <td>✅</td>
                            <td><a href={{ route('adminPaymentsDelete', $payment->id) }} class="pure-button pure-button-primary">🗑️</a></td>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $payments->onEachSide(10)->links() }}

@endsection
