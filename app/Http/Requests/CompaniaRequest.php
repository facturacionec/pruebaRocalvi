<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ruc' => ['required',"numeric","size:10"],
            'razon_social' => ['required',"size:10"]            
        ];
    }

    public function messages()
    {
        return[
            'cedula.required' => 'La cédula es requerida.',
            'cedula.numeric' => 'La cédula debe ser numerica.',
            'cedula.numeric' => 'Cédula: La cantidad máxima de caracteres es 10',
            'razon_social.size' => 'Raz[on Social: La cantidad máxima de caracteres es 10',





        ];
        
    }
}
