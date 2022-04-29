<?php

namespace App\Http\Requests\Panel\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:courses'],
            'meta_description' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'string'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'string'],
            'banner' => ['required', 'image', 'max:2024'],
            'img_alt' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'pre_course' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
            'course_status' => ['required', 'boolean'],
            'course_level' => ['required', 'integer'],
            'offer_id' => ['nullable', 'integer'],
            'content' => ['required']
        ];
    }
}
