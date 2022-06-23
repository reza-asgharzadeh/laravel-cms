<?php

namespace App\Http\Requests\Panel\Episode;

use Illuminate\Foundation\Http\FormRequest;

class CreateEpisodeRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', 'unique:episodes'],
            'downloadUrl' => ['required', 'string', 'max:200', 'unique:episodes'],
            'description' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string', 'max:200'],
            'time' => ['required', 'string', 'max:9'],
            'display' => ['required', 'boolean'],
            'chapter_id' => ['required','integer']
        ];
    }
}
