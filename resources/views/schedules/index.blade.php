@extends('layouts.master')

@section('card-title')
Agendamentos
@endsection

@section('button-novo')
<a href="{{route('schedules.create')}}" data-toggle="tooltip" class="btn btn-success" tooltip-left="Nova junta médica">
  <i class="fas  fa-lg fa-plus-square"></i>
  Novo
</a>
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cliente</th>
        <th scope="col">Data do agendamento</th>
        <th scope="col">valor</th>
        <th scope="col">Realizado</th>
        <th class="text-center" scope="col">Ações</th>
        <th class="text-center" scope="col">Excluir</th>
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
        <td class="text-center">
          <form id="formulario" action="{{ route('schedules.destroy',$shedule->id) }}"  method="POST">
            @csrf
          @method('DELETE')
          <a href="{{ route('schedules.destroy',$shedule->id) }}" title="Excluir cliente" class="text-danger">
              <span class="fa-stack">
                {{-- <i class="fas fa-trash"></i> --}}
            </span>
          </a>
            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este agendamento de serviço?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
        </form>
        </td>
      </tr>
      @empty
      <tr>
          <td colspan="7" align="center"><label style="font-weight: bolder">Nenhum agendamento cadastrado.</label></td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

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
