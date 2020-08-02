@extends('layouts.master')

@section('card-title')
Atualizar agendamento do cliente (a): {{$schedule->client->nome}}
@endsection

@section('content')

@include('schedules.form', [
'rota' => route('schedules.update', $schedule->id),
'method' => 'PUT'
])
@endsection