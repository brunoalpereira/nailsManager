<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfosRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|string',
            'id_user' => 'required|numeric',
            'complement' => 'string',
            'address_number' => 'required|string',
            'cep' => 'required|numeric',
            'phone' => 'required|string'

        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Preencha o Endereço',
            'address.string' => 'Endereço deve ser em formato de texto',
            'id_user.numeric' => 'Informe Id do usuário',
            'id_user.required' => 'Escolha um usúario',
            'complement.string' => 'O complemento deve ser em formato de texto',
            'address_number.required' => 'Numero residencial obrigatório',
            'address_number.string' => 'Numero residencial deve ser em formato de texto',
            'cep.required' => 'Numero cep obrigatório',
            'cep.numeric' => 'Numero cep deve ser em formato numérico',
            'phone.string' => 'Numero cep deve ser em formato texto',
            'phone.required' => 'Numero telefone obrigatório',

        ];
    }
}
