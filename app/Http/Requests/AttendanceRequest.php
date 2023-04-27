<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'services' => 'required',
            'user_id' => 'required|numeric',
            'hour' => 'required',
            'date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'services.required' => 'Preencha com pelo menos um serviço',
            'user_id.required' => 'Usuário obrigatório',
            'user_id.numeric' => 'Informe Id do usuário',
            'hour.required' => 'Hora obrigatória',
            'date.required' => 'Data obrigatória'
        ];
    }
}
