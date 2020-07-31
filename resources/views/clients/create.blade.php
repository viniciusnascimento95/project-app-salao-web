@extends('layouts.master')

@section('card-header')
Cadastrar novo cliente
@endsection

@section('content')

@include('clients.form', [
'rota' => route('clients.store')
])
@endsection