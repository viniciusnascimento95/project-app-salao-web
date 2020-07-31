<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:clients|max:200',
            'email' => 'required|unique:clients',
            'contato' => 'required|max:11',
            'endereco' => 'required|max:200'
        ];
    }
    public function attributes()
    {
        return [
            'nome' => 'nome',
            'email' => 'email'
        ];
    }
    public function messages()
    {
        return [
            'nome.unique' => 'Já existe um dado com esse nome.',
            'email.unique' => 'Já existe um e-mail com esse nome.',
            'contato.unique' => 'Já existe um contato com esse nome.',
        ];
    }
}
