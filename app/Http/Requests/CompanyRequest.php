<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{   
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'description' => [
                'required',
                'max:60',
                //'unique:companies'
                Rule::unique('companies')->ignore($this->company)
            ],
            'country' => 'required|string|max:60'
        ];
    }

    public function messages(){
        return [
            'description.required' => 'La descripción no puede estar vacía.',
            'description.max' => 'La descripción sobrepasa el límite de caracteres.',
            'description.unique' => 'La descripción ya existe!!!!',
            'country.required' => 'El país no puede estar vacío.',
            'country.string' => 'El país tiene un formato no permitido.',
            'country.max' => 'El país sobrepasa el límite de caracteres.',
        ];
    }
}
