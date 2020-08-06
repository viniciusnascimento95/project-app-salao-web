<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class SchedulesFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'client_id' => 'required',
            'data_hora_agendamento' => 'required',
            'descricao' => 'required',
            'valor' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'servico_realizado' => 'nullable'
        ];
    }
    public function attributes()
    {
        return [
            'client_id' => 'Cliente',
            'data_hora_agendamento' => 'Data e hora agendamento',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
        ];
    }
    public function messages()
    {
        return [
            'data_hora_agendamento.unique' => 'Já existe um agendamento para essa data e hora.',
            'client_id.required' => 'Por favor informe o seu cliente.',
            'descricao.required' => 'Por favor informe descrição do serviço.',
            'valor.required' => 'Por favor informe valor do serviço.'
        ];
    }
}
