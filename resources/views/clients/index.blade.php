@extends('layouts.master')

@section('card-title')
Clientes
@endsection

@section('button-novo')
<a href="{{route('clients.create')}}" data-toggle="tooltip" class="btn btn-success" tooltip-left="Nova junta médica">
  <i class="fas  fa-lg fa-plus-square"></i>
  Novo
</a>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12 my-2">
      <form action="{{ route('client.getBuscar') }}" method="GET" class="form-inline">
          <input name="valor" value="{{ request()->query('valor') }}" class="form-control mr-sm-2 col-12 col-sm-6 col-md-5 col-lg-4" type="search"
              placeholder="Pesquisar" aria-label="Search">
          <button class="btn btn-outline-success mt-2 mt-sm-0" type="submit">Buscar</button>
      </form>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Contato</th>
        <th scope="col">Email</th>
        <th class="text-center" scope="col">Ações</th>
        {{-- <th class="text-center" scope="col">Excluir</th> --}}
      </tr>
    </thead>
    <tbody>
      @forelse ($clients as $client)
      <tr>
        <th>{{$client->id}}</th>
        <td class="text-wrap text-capitalize">{{$client->nome}}</td>
        <td>{{$client->contato}}</td>
        <td>{{$client->email}}</td>
        <td class="text-center">
          <a href="{{route('clients.edit', $client->id)}}" title="Editar dados" class="text-dark">
              <span class="fa-stack">
                  <i class="fas fa-pencil-alt"></i>
              </span>
          </a>
          <a href="{{route('clients.show', $client->id)}}" title="Visualizar cliente" class="text-primary">
            <span class="fa-stack">
                <i class="fas fa-eye"></i>
            </span>
        </a>
        </td>      
      </tr>
      @empty
      <tr>
          <td colspan="6" align="center"><label style="font-weight: bolder">Nenhum cliente cadastrado.</label></td>
      </tr>
      @endforelse
    </tbody>
    
  </table>
</div>

  <!--Paginacao dos dados-->
  @component('components.page_rodape', ['modelo' => $clients])
  @endcomponent
  <!--FIM Paginacao dos dados-->
@endsection
