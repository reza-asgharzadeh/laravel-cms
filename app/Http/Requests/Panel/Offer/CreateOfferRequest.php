<?php

namespace App\Http\Requests\Panel\Offer;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
            'code' => ['required','string', 'max:255', 'unique:offers'],
            'type' => ['required','in:fixed,percent'],
            'value' => ['required','integer','between:1,100'],
            'expiry_date' => ['required','date_format:Y-m-d H:i:s']
        ];
    }
}
