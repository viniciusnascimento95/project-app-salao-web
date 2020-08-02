<form action="{{ $rota }}" method="POST" onsubmit="Salvando()" enctype="multipart/form-data">
  @csrf

  @isset($method)
    @method($method)
  @endisset

  <div class="row">
    <div class="col-sm-6 col-md-7">
      <div class="form-group">
        <label class="">Selecione o cliente:</label>
        <select name="client_id" id="client" class="form-control {{ $errors->has('client_id') ? 'is-invalid': '' }}" value="{{ isset($schedule) && isset($schedule->client_id) && empty (old('client_id')) ? $schedule->client_id : old('client_id') }}" style="width: 100%;" title="Selecione o cliente">
        {{-- <option value="{{$schedule->id}}">{{$schedule->client->nome}}</option> --}}
        </select>
      </div>
    </div>
    <div class="col-sm-2 col-md-3">
      <div class="form-group">
        <label class="">Data e hora:</label> 
        {{-- {{$schedule->data_hora_agendamento->format('d/m/Y H:i')}} --}}
        <input type="datetime" name="data_hora_agendamento" class="form-control datepicker {{ $errors->has('data_hora_agendamento') ? 'is-invalid': '' }}" value="{{ isset($schedule) && isset($schedule->data_hora_agendamento) && empty (old('data_hora_agendamento')) ? $schedule->data_hora_agendamento->format('d/m/Y H:i') : old('data_hora_agendamento') }}" title="Selecione o data e hora">
        @if($errors->has('data_hora_agendamento'))
        <div class="invalid-feedback">
          {{$errors->first('data_hora_agendamento')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="form-check">
        {{-- <input type="text" name="servico_realizado" class="form-control {{ $errors->has('servico_realizado') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($schedule) && isset($schedule->servico_realizado) && empty (old('servico_realizado')) ? $schedule->servico_realizado : old('servico_realizado') }}" title="Endereço"> --}}
        <input type="checkbox" class="form-check-input {{ $errors->has('servico_realizado') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($schedule) && isset($schedule->servico_realizado) && empty (old('servico_realizado')) ? $schedule->servico_realizado : old('servico_realizado') }}" name="servico_realizado">
        <label class="form-check-label">Realizado ?: </label><br>
        @if($errors->has('endereco'))
        <div class="invalid-feedback">
          {{$errors->first('endereco')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-sm-12">
      <div class="form-group">
          <label class="dinfo-label-required">Descrição do serviço:</label>
          <textarea class="form-control {{ $errors->has('descricao') ? 'is-invalid': '' }}" rows="5" name="descricao"
              id="descricao">{{isset($schedule) && isset($schedule->descricao) && empty (old('descricao')) ? ($schedule->descricao ? $schedule->descricao : '') : old('descricao') }}</textarea>
          @if($errors->has('descricao'))
          <div class="invalid-feedback">
              {{$errors->first('descricao')}}
          </div>
          @endif
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="form-group">
        <label class="">Valor:</label>
        <input type="text" name="valor" class="form-control {{ $errors->has('valor') ? 'is-invalid': '' }}" autocomplete="off" value="{{ isset($schedule) && isset($schedule->valor) && empty (old('valor')) ? $schedule->valor : old('valor') }}" title="Valor do serviço">
        @if($errors->has('valor'))
        <div class="invalid-feedback">
          {{$errors->first('valor')}}
        </div>
        @endif
      </div>
    </div>
  </div>

  <a href="{{route('schedules.index')}}" class="btn btn-primary" data-toggle="tooltip" tooltip-right="Voltar">
    <i class="fas fa-fw fa-lg fa-arrow-left"></i> Voltar
  </a>
  <button type="submit" class="btn btn-success" data-toggle="tooltip" tooltip-right="Salvar dados">
    <i class="fas fa-fw fa-lg fa-save"></i> Salvar
  </button>
</form>
@section('scripts')
<script>
$('.datepicker').datetimepicker();

$('#client').select2({
        language: 'pt-BR',
        // minimumInputLength: 1,
        ajax: {
            url: '/client/pesquisar-select2',
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });
</script>
@endsection
