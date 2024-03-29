<?php

namespace App\Http\Requests\Panel\NewsLetter;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsLetterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:100', 'unique:news_letters'],
        ];
    }
}
