@extends('layouts.master')

@section('card-title')
Editar dados cliente : {{$client->nome}}
@endsection

@section('content')

@include('clients.form', [
'rota' => route('clients.update', $client->id),
'method' => 'PUT'
])
@endsection