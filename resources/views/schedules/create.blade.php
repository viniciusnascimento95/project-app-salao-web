@extends('layouts.master')

@section('card-header')
Agendar horário
@endsection

@section('content')

@include('shedules.form', [
'rota' => route('shedules.store')
])
@endsection