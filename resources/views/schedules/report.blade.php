@extends('layouts.master')

@section('card-title')
<i class="fas fa-chart-line"></i> Faturamento
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12 my-2 mb-4">
      <form action="{{route('buscar')}}" method="GET">
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="form-group">
              <label>Data inicial:</label>
              <input class="form-control {{ $errors->has('data_inicial') ? 'is-invalid': '' }}" type="date" name="data_inicial" value="{{isset($data_inicial) ? $data_inicial : ''}}">
              @if($errors->has('data_inicial'))
                  <div class="invalid-feedback">
                      {{$errors->first('data_inicial')}}
                  </div>
              @endif
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Data final: </label>
              <input class="form-control {{ $errors->has('data_final') ? 'is-invalid': '' }}" type="date" name="data_final" value="{{isset($data_final) ? $data_final : ''}}">
              @if($errors->has('data_final'))
                  <div class="invalid-feedback">
                      {{$errors->first('data_final')}}
                  </div>
              @endif
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Situação do serviço:</label>
              <select class="form-control" name="situacao_servico" id="situacao_servico">
                <option value='3' selected >Ambos</option>
                <option value="1" {{ isset($situacao_servico) ? ($situacao_servico == 1 ? 'selected' : '') : ''}}>Realizados</option>
                <option value="0" {{ isset($situacao_servico) ? ($situacao_servico == 0 ? 'selected' : '') : ''}}>Não Realizados</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <button class="btn btn-success" style="margin-top: 12%;" type="submit"><span><i class="fas fa-filter"></i></span>  Filtrar</button>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cliente</th>
        <th scope="col">Data do agendamento</th>
        <th scope="col">valor</th>
        <th scope="col">Realizado</th>
        {{-- <th class="text-center" scope="col">Ações</th>
        <th class="text-center" scope="col">Excluir</th> --}}
      </tr>
    </thead>
    <tbody>
      @forelse ($schedules as $shedule)
      <tr>
        <th>{{$shedule->id}}</th>
        <td>{{$shedule->client->nome}}</td>
        <td>{{$shedule->data_hora_agendamento->format('d/m/Y H:i')}}</td>
        {{-- <td>{{$shedule->data_hora_agendamento}}</td> --}}
        <td>R$  {{$shedule->valor}}</td>
        @if ($shedule->servico_realizado == 0 )
        <td>Não realizado</td>
        @else
        <td>Realizado</td>
        @endif
       
      </tr>
      @empty
      <tr>
          <td colspan="7" class="text-center"><label style="font-weight: bolder">Nenhum agendamento.</label></td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <p><strong>Total gastos por páginas: R$</strong><span> {{$schedules->sum('valor')}} </span></p>
  {{-- <p class="text-right"><strong>Total de gastos :</strong>{{$total}}</p><br> --}}
</div>


<!--Paginacao dos dados-->
@component('components.page_rodape', ['modelo' => $schedules])
@endcomponent
<!--FIM Paginacao dos dados-->

<a href="{{route('home')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
  <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
</a>
@endsection
@section('scripts')

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            type: 'success',
            title: 'Sucesso!',
            text: '{{ $message }}',
            showConfirmButton: true,
            timer: 10000
        })
    </script>
@endif
@endsection
