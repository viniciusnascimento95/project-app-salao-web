@extends('layouts.master')

@section('card-title')
Agendar horário
@endsection

@section('content')

@include('schedules.form', [
'rota' => route('schedules.store')
])
@endsection