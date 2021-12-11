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
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('episodes')->ignore($episode->id)],
            'price' => ['required', 'integer'],
            'time' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'course_id' => ['required','integer']
        ];
    }
}
