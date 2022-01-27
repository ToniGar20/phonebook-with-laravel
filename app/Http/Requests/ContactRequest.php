<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first-name' => 'required|between:2,30',
            'last-name' => 'required|between:2,30',
            'phone' => 'required|size:9',
            'phone-type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first-name.required' => 'El nombre es requerido',
            'first-name.between' => 'El nombre ha de tener entre 2 y 30 caracteres',

            'last-name.required' => 'El apellido es requerido',
            'last-name.between' => 'El apellido ha de tener entre 2 y 30 caracteres',

            'phone.required' => 'El teléfono es requerido',
            'phone.integer' => 'El teléfono ha de tener valor numérico',
            'phone.size' => 'El teléfono ha de tener 9 dígitos',

            'phone-type.required' => 'El tipo de teléfono es requerido'

        ];
    }

}
