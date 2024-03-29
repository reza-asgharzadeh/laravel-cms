<?php

namespace App\Http\Requests\Panel\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'unique:categories'],
            'slug' => ['required', 'string', 'max:100', 'unique:categories'],
            'category_id' => ['nullable','integer']
        ];
    }
}
