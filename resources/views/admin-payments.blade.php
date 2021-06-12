@extends('layouts.master')

@section('title', '[A] Wpłaty')


@section('animated-content')
    <h1>Panel Administratora</h1>
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
                <th class="my-th" scope="col">Usuń</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="my-tr">
                        <th class="my-th" scope="row">{{ $payment->id }}</th>
                        <td class="my-td">{{ $payment->user_id }}</td>
                        <td class="my-td">{{ $payment->amount }}</td>
                        <td class="my-td">{{ $payment->withdraw }}</td>
                        <td class="my-td">{{ $payment->created_at }}</td>
                        <td class="my-td">{{ $payment->created_by }}</td>
                        <td class="my-td">{{ $payment->updated_at }}</td>
                        <td class="my-td">{{ $payment->updated_by }}</td>
                        <td class="my-td">{{ $payment->deleted_by }}</td>
                        <td class="my-td">USUŃ</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{ $payments->onEachSide(10)->links() }}

@endsection
