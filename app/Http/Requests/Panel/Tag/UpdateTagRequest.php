<?php

namespace App\Http\Requests\Panel\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
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
        $tag = $this->route('tag');
        return [
            'name' => ['required', 'string', 'max:100', Rule::unique('tags')->ignore($tag->id)],
            'slug' => ['required', 'string', 'max:100', Rule::unique('tags')->ignore($tag->id)],
        ];
    }
}
