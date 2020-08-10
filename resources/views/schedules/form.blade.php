<style>
.label-required:after {
  content: "*";
  color: red;
}
</style>
<form action="{{ $rota }}" method="POST" onsubmit="Salvando()" enctype="multipart/form-data">
    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
            <label class="label-required">Selecione o cliente:</label>
                <select class="form-control select2 {{ $errors->has('client_id') ? 'is-invalid': '' }}" style="width: 100%;" name="client_id" title="Selecione o cliente">
                    @if(Request::old('client_id'))
                        <option value="{{$pessoa->id}}">{{$pessoa->nome}} / {{$pessoa->contato}}</option>
                    @endif
                    @if(Request::old('client_id') == NULL && isset($schedule))
                        <option value="{{$cliente->id}}">{{$cliente->nome}} / {{$cliente->contato}}</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label class="label-required">Data e hora:</label>
                <input type="text" class="form-control" id="data_fake">
                <div id="app">
                    <example-component data-agendamento="{{isset($schedule) && isset($schedule->data_hora_agendamento) && empty (old('data_hora_agendamento')) ?
                        $schedule->data_hora_agendamento_Formated() : (old('data_hora_agendamento') ? ($data_hora ? $data_hora : ''): '')}}"></example-component>
                </div>
               
                @if($errors->has('data_hora_agendamento'))
                    <div class="invalid-feedback">
                        {{$errors->first('data_hora_agendamento')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="label-required">Realizado ?: </label><br>
                <select class="form-control {{ $errors->has('servico_realizado') ? 'is-invalid': '' }}" name="servico_realizado">
                    <option value="0" {{isset($schedule) ? (!empty($schedule->servico_realizado) ? ( $schedule->servico_realizado == 0 ? 'selected' : '') : '' ) : (old('servico_realizado') ? (old('servico_realizado') == 0 ? 'selected' : '') : '' ) }} >Não realizado</option>  
                    <option value="1" {{isset($schedule) ? (!empty($schedule->servico_realizado) ? ( $schedule->servico_realizado == 1 ? 'selected' : '') : '' ) : (old('servico_realizado') ? (old('servico_realizado') == 1 ? 'selected' : '') : '' ) }}>Realizado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
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
        <div class="col-md-2">
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
        $('.select2').select2({
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
    <script>
        $(document).ready()
        {
            var element = document.getElementById("data_fake"); // notice the change
            element.parentNode.removeChild(element);
        }
    </script>
@endsection
