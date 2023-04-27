<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'name' => 'required|string',
            'value' => 'required|numeric',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha o nome do serviço',
            "name.string" =>'Preencha o nome com texto',
            "value.numeric" =>'Preencha o valor com numeros',
            "value.required" =>'Preencha o valor',
            "description.required" =>'Descriçao de serviço obrigatória',
            "description.string" =>'Descriçao de serviço precisa ser um texto'
        ];
    }
}
