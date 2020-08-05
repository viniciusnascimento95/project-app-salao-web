@extends('layouts.master')

@section('card-title')
  Detalhes cliente : {{$client->nome}}
@endsection

@section('content')

<div class="row">
  <div class="col-sm-3">
    <label>Email: {{$client->email}}</label>
  </div>
  <div class="col-sm-3">
    <label>Contato: {{$client->contato}}</label>
  </div>
  <div class="col-sm-4">
    <label>Endereço: {{$client->endereco}}</label>
  </div>
</div>
<br>
<br>
<br>

<div class="row">
  <h4 class="text-center">Historico de atendimentos</h4>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          {{-- <th scope="col">Cliente</th> --}}
          <th scope="col">Data do agendamento</th>
          <th scope="col">valor</th>
          <th scope="col">Realizado</th>
          <th class="text-center" scope="col">Ações</th>
          
        </tr>
      </thead>
      <tbody>
        @forelse ($schedules as $shedule)
        <tr>
          <th>{{$shedule->id}}</th>
          {{-- <td>{{$shedule->client->nome}}</td> --}}
          <td>{{$shedule->data_hora_agendamento->format('d/m/Y H:i')}}</td>
          {{-- <td>{{$shedule->data_hora_agendamento}}</td> --}}
          <td>{{$shedule->valor}}</td>
          @if ($shedule->servico_realizado == 0 )
          <td>Não realizado</td>
          @else
          <td>Realizado</td>
          @endif
          <td class="text-center">
            <a href="{{route('schedules.edit', $shedule->id)}}" title="Editar dados" class="text-dark">
                <span class="fa-stack">
                    <i class="fas fa-pencil-alt"></i>
                </span>
            </a>
            <a href="{{route('schedules.show', $shedule->id)}}" title="Visualizar cliente" class="text-primary">
              <span class="fa-stack">
                  <i class="fas fa-eye"></i>
              </span>
          </a>
          </td>          
        </tr>
        @empty
        <tr>
            <td colspan="7" align="center"><label style="font-weight: bolder">Nenhum agendamento cadastrado.</label></td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <p><strong>Total gastos por paginas:</strong> {{$schedules->sum('valor')}} </p>
    <p class="text-right"><strong>Total de gastos :</strong>{{$total}}</p><br>
  </div>
  
  <br>
    <!--Paginacao dos dados-->
    @component('components.page_rodape', ['modelo' => $schedules])
    @endcomponent
    <!--FIM Paginacao dos dados-->
</div>



  <a href="{{route('clients.index')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
    <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
  </a>
@endsection