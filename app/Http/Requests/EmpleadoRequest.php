<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'cedula' => ['required',"numeric",'digits:10'],
            'apellido1' => ['required'],
            'apellido2' => [''],
            'nombre1' => ['required'],
            'nombre2' => [''],
            'correo' => ['required',"email:rfc,dns"],
            'telcel' => [''],
            'telefono' => ['required'],
            'telext' => [''],
            'whatsapp' => [''],
            'cargo_id' => ['required'],
            'empresa_id' => ['required'],
            'estado_id' => ['required']
        ];
    }
    public function messages()
    {
        return[
            'cedula.required' => 'La cédula es requerida.',
            'cedula.numeric' => 'La cédula debe ser numerica.',
            'cedula.digits' => 'Cédula: La cantidad máxima de caracteres es 10',
            'correo.email' => 'El Correo debe ser una direccion de correo válido.',






        ];
        
    }
}
