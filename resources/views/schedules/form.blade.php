<form action="{{ $rota }}" method="POST" onsubmit="Salvando()" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="row">
        <div class="col-sm-6 ">
            <div class="form-group">
                <label class="">Selecione o cliente:</label>
                {!! Form::select('client_id',$client_select,null,['style="width: 100%;" title="Selecione o cliente"','class'=>'form-control']) !!}

                {{--<select name="client_id" id="client" class="form-control {{ $errors->has('client_id') ? 'is-invalid': '' }}" value="{{ isset($schedule) && isset($schedule->client_id) && empty (old('client_id')) ? $schedule->client_id : old('client_id') }}" >
              <option selected value="{{$schedule->id}}">{{$schedule->client->nome}}</option>
              </select> --}}
            </div>
        </div>
        <div class="col-sm-5 ">
            <div class="form-group">
                <label class="">Data e hora:</label>
                <input type="datetime-local" name="data_hora_agendamento"
                       class="form-control agendamento {{ $errors->has('data_hora_agendamento') ? 'is-invalid': '' }}"
                       value="{{isset($schedule) && isset($schedule->data_hora_agendamento) && empty (old('data_hora_agendamento')) ?
                       $schedule->data_hora_agendamento_Formated() : old('data_hora_agendamento')}}" title="Selecione o data e hora">

                @if($errors->has('data_hora_agendamento'))
                    <div class="invalid-feedback">
                        {{$errors->first('data_hora_agendamento')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-3 ">

            <div class="form-grup">

                <label class="form-check-label" for="servico_realizado">Realizado ?: </label><br>

                <select class="form-control {{ $errors->has('servico_realizado') ? 'is-invalid': '' }}" name="servico_realizado">
                  <option value="0">Não realizado</option>
                  <option value="1">Realizado</option>

                </select>

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
                <textarea class="form-control {{ $errors->has('descricao') ? 'is-invalid': '' }}" rows="5"
                          name="descricao"
                          id="descricao">{{isset($schedule) && isset($schedule->descricao) && empty (old('descricao')) ? ($schedule->descricao ? $schedule->descricao : '') : old('descricao') }}</textarea>
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                        {{$errors->first('descricao')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="form-group">
                <label class="">Valor:</label>
                <input type="text" name="valor" class="form-control {{ $errors->has('valor') ? 'is-invalid': '' }}"
                       autocomplete="off"
                       value="{{ isset($schedule) && isset($schedule->valor) && empty (old('valor')) ? $schedule->valor : old('valor') }}"
                       title="Valor do serviço">
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
