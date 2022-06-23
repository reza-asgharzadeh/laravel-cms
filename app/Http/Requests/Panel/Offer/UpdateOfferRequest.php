<?php

namespace App\Http\Requests\Panel\Offer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $offer = $this->route('offer');

        return [
            'code' => ['required','string', 'max:50', Rule::unique('offers')->ignore($offer->id)],
            'type' => ['required','in:fixed,percent'],
            'value' => ['required','integer'],
            'expiry_date' => ['nullable','date_format:Y-m-d H:i:s']
        ];
    }
}
