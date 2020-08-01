@extends('layouts.master')

@section('card-title')
Detalhe do serviço cliente(a): {{$shedule->client()->nome}}
@endsection

@section('content')

<div class="row">
  <div class="col-sm-3">
    {{-- <label>Email: {{$client->email}}</label> --}}
  </div>
  <div class="col-sm-3">
    {{-- <label>Contato: {{$client->contato}}</label> --}}
  </div>
  <div class="col-sm-4">
    {{-- <label>Endereço: {{$client->endereco}}</label> --}}
  </div>
</div>
  <a href="{{route('shedules.index')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
    <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
  </a>
@endsection