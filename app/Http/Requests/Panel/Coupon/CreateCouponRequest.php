<?php

namespace App\Http\Requests\Panel\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponRequest extends FormRequest
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
            'code' => ['required','string', 'max:50', 'unique:coupons'],
            'type' => ['required','in:fixed,percent'],
            'value' => ['required','integer'],
            'cart_value' => ['required','integer'],
            'quantity' => ['required','integer'],
            'expiry_date' => ['required','date_format:Y-m-d H:i:s']
        ];
    }
}
