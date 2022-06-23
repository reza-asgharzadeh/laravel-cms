<?php

namespace App\Http\Requests\Panel\Episode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEpisodeRequest extends FormRequest
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
        $episode = $this->route('episode');
        return [
            'name' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', Rule::unique('episodes')->ignore($episode->id)],
            'downloadUrl' => ['required', 'string', 'max:200', Rule::unique('episodes')->ignore($episode->id)],
            'description' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string', 'max:200'],
            'time' => ['required', 'string', 'max:9'],
            'display' => ['required', 'boolean'],
            'chapter_id' => ['required','integer']
        ];
    }
}
