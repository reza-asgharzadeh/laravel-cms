<?php

namespace App\Http\Requests\Panel\NewsLetter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsLetterRequest extends FormRequest
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
        $newsletter = $this->route('newsletter');
        return [
            'email' => ['required', 'string', 'email', 'max:100', Rule::unique('news_letters')->ignore($newsletter->id)],
        ];
    }
}
