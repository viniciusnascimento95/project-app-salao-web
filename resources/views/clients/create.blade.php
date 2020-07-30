@extends('layouts.master')

@section('card-header')
Cadastrar novo cliente
@endsection

@section('content')

@include('clients.form.client', [
'rota' => route('clients')
])
@endsection