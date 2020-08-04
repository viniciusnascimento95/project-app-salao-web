{{-- @extends('layouts.app') --}}
@extends('layouts.master')

@section('card-title')
Principal
@endsection

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-10"> --}}
            
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                @foreach ($agendamentos as $item)
                <div class="form-group">
                    <div class="card-body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-secondary">
                          <span class=""><i class="fa fa-calendar"></i> {{$item->data_hora_agendamento->format('d/m/Y H:i')}}</span><br>
                          <div class="card-text">
                            <span class="info-box-text text-capitalize"><strong>Cliente(a): </strong> {{$item->client->nome}} </span><br>
                            <span class="info-box-text text-capitalize"><strong>Contato(a): </strong> {{$item->client->contato}} </span><br>
                            <span class="info-box-number"><strong>Valor : </strong>{{$item->valor}}</span><br>
                          </div>
                          <span >{{$item->descricao}}</span>
                         
                        </div> 
                        <a href="{{route('schedules.edit', $item->id)}}" title="Editar dados" class="btn btn-primary">
                            Atualizar agendamento
                        </a>                     

                      </div>
                    </div>
                </div>
                @endforeach
               
    </div>
</div> 
@endsection

<script src="{{ asset('js/app.js') }}"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.3/jquery.inputmask.js" integrity="sha512-0iy/+wgbVlUUD37ZlJ2nGEeCmal4To2J5tT99AZWu2gNeYAJTtRDY/zLONohnECXjfEor7JgXgpTyWMUYciOcg==" crossorigin="anonymous"></script>
<script src="{{ asset('scripts/maskvalid.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
