<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimesFormRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'sinopse' => 'required'
        ];
    }
    public function messages(){

        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter ao menos 3 letras'
        ];
    }

}
