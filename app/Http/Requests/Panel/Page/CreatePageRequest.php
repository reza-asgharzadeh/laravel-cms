<?php

namespace App\Http\Requests\Panel\Page;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', 'unique:pages'],
            'banner' => ['required', 'image', 'max:2024'],
            'img_alt' => ['required', 'string', 'max:150'],
            'content' => ['required','string'],
            'is_approved' => ['required','boolean']
        ];
    }
}
