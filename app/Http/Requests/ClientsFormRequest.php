<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

    public function rules(Request $request)
    {
        return [
            'nome' => 'required|max:200',
            'email' => ['nullable', Rule::unique('clients')->ignore($request->client)],
            'contato' => ['required', 'max:15',Rule::unique('clients')->ignore($request->client)],
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
            'email.unique' => 'Já existe um e-mail com esse nome.',
            'contato.unique' => 'Já existe um contato com esse nome.',
        ];
    }
}
