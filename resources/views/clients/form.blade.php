@section('card-title')
Formulário de cadastro de cliente
@endsection

<form action="{{ $rota }}" method="POST" onsubmit="Salvando()" enctype="multipart/form-data">
  @csrf

  @isset($method)
    @method($method)
  @endisset

  <div class="row">
    <div class="col-sm-6 col-md-8">
      <div class="form-group">
        <label class="">Nome:</label>
        <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($client) && isset($client->nome) && empty (old('nome')) ? $client->nome : old('nome') }}" title="Nome do cliente">
        @if($errors->has('nome'))
        <div class="invalid-feedback">
          {{$errors->first('nome')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-sm-2 col-md-3">
      <div class="form-group">
        <label class="">Email:</label>
        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($client) && isset($client->email) && empty (old('email')) ? $client->email : old('email') }}" title="E-mail do cliente">
        @if($errors->has('email'))
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-sm-2 col-md-3">
      <div class="form-group">
        <label class="">Contato:</label>
        <input type="text" name="contato" class="form-control telefone_celular {{ $errors->has('contato') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($client) && isset($client->contato) && empty (old('contato')) ? $client->contato : old('contato') }}" title="Contato">
        @if($errors->has('contato'))
        <div class="invalid-feedback">
          {{$errors->first('contato')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-sm-6 col-md-8">
      <div class="form-group">
        <label class="">Endereço:</label>
        <input type="text" name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($client) && isset($client->endereco) && empty (old('endereco')) ? $client->endereco : old('endereco') }}" title="Endereço">
        @if($errors->has('endereco'))
        <div class="invalid-feedback">
          {{$errors->first('endereco')}}
        </div>
        @endif
      </div>
    </div>
  </div>

  <a href="{{route('clients.index')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
    <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
  </a>
  <button type="submit" class="btn btn-success" data-toggle="tooltip" tooltip-right="Salvar dados">
    <i class="fas fa-fw fa-lg fa-save"></i> Salvar
  </button>
</form>
