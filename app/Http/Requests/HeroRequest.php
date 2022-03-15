<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class HeroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'hero_name' => [
                'required',
                'max:100',
                Rule::unique('heroes')->ignore($this->hero)
            ],
            'company_id' => 'required',
            'actor_name' => 'required|max:100',
            'nation' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'hero_name.required' => 'Nombre del héroe requerido.',
            'hero_name.max' => 'El nombre del héroe excede el límite.',
            'hero_name.unique' => 'el nombre del héroe ya existe.',
            'company_id.required' => 'Debe seleccionar una compañia.',
            'actor_name.string' => 'Nombre de actor requerido.',
            'actor_name.max' => 'El nombre del actor excede el límite.',
            'nation.string' => 'País requerido.',
            'nation.max' => 'País excede el límite.',
        ];
    }
}
