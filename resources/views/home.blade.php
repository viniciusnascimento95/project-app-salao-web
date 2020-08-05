@extends('layouts.master')

@section('card-title')
Principal
@endsection
<style>
    #home{
        background-image: url('https://thumbs.dreamstime.com/z/%C3%ADcones-lineares-m%C3%ADnimos-da-barbearia-do-sal%C3%A3o-de-beleza-e-cabeleireiro-no-fundo-coral-pastel-teste-padr%C3%A3o-sem-emenda-cuidado-141537200.jpg') ;
        background-size: cover;
        border-radius: 15px;    }
</style>

@section('content')
<div class="container-fluid" id="home">
    <div class="row">
        @foreach ($agendamentos as $item)
        <div class="form-group">
            <div class="card-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-secondary" style="border-color: #4759e4; border-radius: 30px;">
                        <p class="text-center">
                            <a href="{{route('schedules.edit', $item->id)}}" title="Atualizar" style="border-radius: 30px; background-color: #d833ff; color: black;" class="btn-sm">
                                Atualizar agendamento
                            </a>       
                            </p> 
                        <span class=""><i class="fa fa-calendar"></i> {{$item->data_hora_agendamento->format('d/m/Y H:i')}}</span><br>
                        <div class="card-text">
                            <span class="info-box-text text-capitalize"><strong>Cliente(a): </strong> {{$item->client->nome}} </span><br>
                            <span class="info-box-text text-capitalize"><strong>Contato(a): </strong> {{$item->client->contato}} </span><br>
                            <span class="info-box-number"><strong>Valor : </strong>{{$item->valor}}</span><br>
                        </div>
                        <span class="font-weight-lighter">{{$item->descricao}}</span>
                    </div>                                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        Total de agendamentos: <strong>{{ $agendamentos->total() }}</strong>
        <br><br>
        {{ $agendamentos ?? ''->appends(request()->query())->links() }}
    </div>
        
</div> 
@endsection

<script src="{{ asset('js/app.js') }}"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.3/jquery.inputmask.js" integrity="sha512-0iy/+wgbVlUUD37ZlJ2nGEeCmal4To2J5tT99AZWu2gNeYAJTtRDY/zLONohnECXjfEor7JgXgpTyWMUYciOcg==" crossorigin="anonymous"></script>
<script src="{{ asset('scripts/maskvalid.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
