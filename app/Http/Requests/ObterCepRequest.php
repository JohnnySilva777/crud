<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObterCepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // <------------------
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cep' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'cep' => 'O campo :attribute precisa ser preenchido'
        ];
    }
}
