@extends('layouts.master')

@section('title', '[A] Wpłaty')


@section('animated-content')
    <h1>Wpłaty/Wypłaty</h1>
    <br>


    <div>
        <table class="my-table">
            <thead>
              <tr class="my-tr">
                <th class="my-th" scope="col">id</th>
                <th class="my-th" scope="col">Użytkownik</th>
                <th class="my-th" scope="col">Kwota</th>
                <th class="my-th" scope="col">Wpłata/Wypłata</th>
                <th class="my-th" scope="col">Data utworzenia</th>
                <th class="my-th" scope="col">Stworzona przez</th>
                <th class="my-th" scope="col">Data aktualizacji</th>
                <th class="my-th" scope="col">Zaktualizowana przez</th>
                <th class="my-th" scope="col">Usunięta przez</th>
                <th class="my-th" scope="col">Usuń/Przywróć</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="my-tr">
                        <th class="my-th" scope="row">{{ $payment->id }}</th>
                        <td class="my-td">{{ $payment->username }}</td>
                        <td class="my-td">{{ $payment->amount }}</td>
                        <td class="my-td">{{ $payment->withdraw }}</td>
                        <td class="my-td">{{ $payment->created_at }}</td>
                        <td class="my-td">{{ $payment->created_by }}</td>
                        <td class="my-td">{{ $payment->updated_at }}</td>
                        <td class="my-td">{{ $payment->updated_by }}</td>
                        <td class="my-td">{{ $payment->deleted_by }}</td>
                        <td class="my-td">
                            <div style="text-align:center"> 
                            <a href={{ route('adminPaymentsDelete', $payment->id) }} class="pure-button pure-button-primary">ZMIEŃ</a>
                            </div>

                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{ $payments->onEachSide(10)->links() }}

@endsection
