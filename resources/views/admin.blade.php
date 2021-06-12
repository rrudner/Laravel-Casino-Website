@extends('layouts.master')

@section('title', '[A] Panel')


@section('animated-content')
    <h1>Panel Administratora</h1>
    <br>

    <a href={{ route('adminPayments') }} class="pure-button pure-button-primary">Wpłaty</a>

@endsection
