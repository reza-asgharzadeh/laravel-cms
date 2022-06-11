<?php

namespace App\Http\Requests\Panel\User\profile;

use Illuminate\Foundation\Http\FormRequest;

class AccountInformationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:40'],
            'profile' => ['nullable', 'image', 'max:2024'],
        ];
    }
}
