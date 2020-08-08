@extends('layouts.master')

@section('card-title')
<i class="fas fa-chart-line"></i> Faturamento
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12 my-2">
      <form action="{{route('buscar')}}" method="GET" class="form-inline my-3 my-lg-0">
          <label>Data inicial : &nbsp; </label>
         <input class="form-control" type="date" name="inicial">
         <label for="">Data final</label>
         <input class="form-control" type="date" name="final">
          <button class="btn btn-outline-success mt-2 mt-sm-0" type="submit">Buscar</button>
      </form>
  </div>
</div>
<br>

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
        <td>{{$shedule->valor}}</td>
        @if ($shedule->servico_realizado == 0 )
        <td>Não realizado</td>
        @else
        <td>Realizado</td>
        @endif
       
      </tr>
      @empty
      <tr>
          <td colspan="7" align="center"><label style="font-weight: bolder">Nenhum agendamento.</label></td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <p><strong>Total gastos por paginas:</strong> {{$schedules->sum('valor')}} </p>
  {{-- <p class="text-right"><strong>Total de gastos :</strong>{{$total}}</p><br> --}}
</div>

<a href="{{route('home')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
  <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
</a>

  <!--Paginacao dos dados-->
  @component('components.page_rodape', ['modelo' => $schedules])
  @endcomponent
  <!--FIM Paginacao dos dados-->
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
