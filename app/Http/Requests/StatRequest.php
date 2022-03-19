<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StatRequest extends FormRequest
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
            'description' => [
                'required',
                'max:60',
                Rule::unique('stats')->ignore($this->stat)
            ]
        ];
    }

    public function messages(){
        return [
            'description.required' => 'La descripción es obligatoria.',
            'description.max' => 'La descripción sobrepasa el límite permitido.',
            'description.unique' => 'La descripción ya existe.',
        ];
    }
}
