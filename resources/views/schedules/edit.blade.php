@extends('layouts.master')

@section('card-title')
Atualizar agendamento do cliente (a): {{$shedule->client()->nome}}
@endsection

@section('content')

@include('shedules.form', [
'rota' => route('shedules.update', $shedule->id),
'method' => 'PUT'
])
@endsection