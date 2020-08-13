@extends('layouts.master')
@section('card-title')
<i class="fas fa-home"></i> Principal
@endsection
<style>
    #home{
        /* background-image: url('https://image.freepik.com/vetores-gratis/mascara-de-beleza-cuidados-com-a-pele-mulher-limpeza-e-escovar-o-rosto-mascaras-de-tratamento-de-acne-dos-desenhos-animados_102902-686.jpg') ; */
        background-image: url('https://laserstetica.com.br/site/wp-content/uploads/2016/05/limpeza-facial.jpg') ;
        background-size: cover;
        border-radius: 15px;    }
</style>
@section('content')
<div class="container-fluid" id="home">
    <div class="row">
        @foreach ($agendamentos as $item)
        <div class="card" style="border-color: #4759e4; margin: 2%; border-radius: 30px;">
            <div class="card-body">
              <h5 class="card-title"><i class="far fa-user"></i> {{$item->client->nome}}</h5>
              <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-calendar"></i> {{$item->data_hora_agendamento->format('d/m/Y H:i')}}</h6>
              <p class="card-text">{{$item->descricao}}</p>
              <a href="#" class="card-link"></a>
              <a href="{{route('schedules.edit', $item->id)}}" title="Atualizar" style="border-radius: 30px; background-color: #cb9ca5; color: black;" class="btn-sm">
                Atualizar agendamento
              </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        Total de agendamentos: <strong>{{ $agendamentos->total() }}</strong>
        <br><br>
        {{ $agendamentos ?? ''->appends(request()->query())->links() }}
        <br>
    </div>        
</div> 
@endsection
@section('scripts')
@endsection
