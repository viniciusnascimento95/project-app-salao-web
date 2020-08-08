@extends('layouts.master')

@section('card-title')
    Detalhe do serviço cliente(a): {{$schedule->client->nome}}
@endsection

@section('content')

    <div class="row">
        <label for="">Valor do serviço: {{$schedule->valor}}</label>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Descrição do serviço:</label>
                <textarea class="form-control"  cols="30" rows="5">{{$schedule->descricao}}</textarea>
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" onload="window.history.back();" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
        <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
    </a>
@endsection
