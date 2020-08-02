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
  <h4>Historico de atendimentos</h4>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">cod</th>
        <th scope="col">Data</th>
        <th scope="col">valor</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>1</td>        
        <td>01/01/2020</td>
        <td>200,00</td>
      </tr>
        <td>2</td>        
        <td>02/01/2020</td>
        <td>50,00</td>
        {{-- <td>@mdo</td> --}}
      </tr>
     
     
    </tbody>
    
  </table>
  <p><strong>Total :</strong>  250,00</p>
</div>



  <a href="{{route('clients.index')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
    <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
  </a>
@endsection