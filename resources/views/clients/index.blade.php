@extends('layouts.master')

@section('card-title')
Clientes
@endsection

@section('button-novo')
<a href="{{route('clients.create')}}" data-toggle="tooltip" class="btn btn-success" tooltip-left="Nova junta médica">
  <i class="far fa-fw fa-lg fa-plus-square"></i>
  Novo
</a>
@endsection

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Contato</th>
      <th scope="col">Email</th>
      <th class="text-center" scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($clients as $client)
    <tr>
      <th>{{$client->id}}</th>
      <td>{{$client->nome}}</td>
      <td>{{$client->contato}}</td>
      <td>{{$client->email}}</td>
      <td class="text-center">
        <a href="{{route('clients.edit', $client->id)}}" title="Editar dados" class="">
            <span class="fa-stack">
                <i class="fas fa-pencil-alt"></i>
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
@endsection
