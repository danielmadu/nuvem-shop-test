<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperheroRequest extends FormRequest
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
            'nickname' => 'required',
            'real_name' => 'required',
            'origin_description' => 'required',
            'superpowers' => 'required',
            'catch_phrase' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'The Nickname field is required.',
            'real_name.required' => 'The Real Name field is required.',
            'origin_description.required' => 'The Origin Description field is required.',
            'superpowers.required' => 'The Superpowers field is required.',
            'catch_phrase.required' => 'The Catch Phrase field is required.',
        ];
    }
}
