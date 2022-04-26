<?php

namespace App\Http\Requests\Panel\Offer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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
            'type' => ['required','in:fixed,percent'],
            'value' => ['required','integer','between:1,100'],
            'course_id' => ['required', 'array'],
            'course_id.*' => ['required', 'integer'],
            'expiry_date' => ['required','date_format:Y-m-d H:i:s']
        ];
    }
}