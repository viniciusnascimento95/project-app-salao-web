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
                  {{-- <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class=" card-title text-center text-capitalize"><strong>Cliente(a): </strong> {{$item->client->nome}} - {{$item->client->contato}} </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div> --}}

                <div class="form-group">
<<<<<<< HEAD
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

=======
                    <div class="card-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="alert alert-secondary">
                                <p class="text-right">
                                    <a href="{{route('schedules.edit', $item->id)}}" title="Editar dados" class="btn btn-primary">
                                        Atualizar agendamento
                                    </a>       
                                    </p> 
                                <span class=""><i class="fa fa-calendar"></i> {{$item->data_hora_agendamento->format('d/m/Y H:i')}}</span><br>
                                <div class="card-text">
                                    <span class="info-box-text text-capitalize"><strong>Cliente(a): </strong> {{$item->client->nome}} </span><br>
                                    <span class="info-box-text text-capitalize"><strong>Contato(a): </strong> {{$item->client->contato}} </span><br>
                                    <span class="info-box-number"><strong>Valor : </strong>{{$item->valor}}</span><br>
                                </div>
                                <span>{{$item->descricao}}</span>
                            </div>                                    
                        </div>
                    </div>
                </div>
                @endforeach              
>>>>>>> 1d221524a652ac556da516487670ba716b9696f9
    </div>
</div>
@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.3/jquery.inputmask.js" integrity="sha512-0iy/+wgbVlUUD37ZlJ2nGEeCmal4To2J5tT99AZWu2gNeYAJTtRDY/zLONohnECXjfEor7JgXgpTyWMUYciOcg==" crossorigin="anonymous"></script>
<script src="{{ asset('scripts/maskvalid.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
