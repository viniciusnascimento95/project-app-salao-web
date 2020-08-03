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
                    <div class="card" style="width: 30rem; border-radius: 15px;" >                
                        <h5 class="text-center text-capitalize"><strong>Cliente(a): </strong> {{$item->client->nome}} - {{$item->client->contato}} </h5>
                        <p class="text-left"><strong>Data: </strong> {{$item->data_hora_agendamento->format('d/m/Y H:i')}}</p>
                        <br>
                        <p class="card-text"><strong>Descrição: </strong> {{$item->descricao}}</p>
                        <p class="text-right"><strong>Valor: </strong>{{$item->valor}}</p>
                        <a href="{{route('schedules.edit', $item->id)}}" title="Editar dados" class="text-dark">
                            <span class="fa-stack">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                        </a>
                        
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
