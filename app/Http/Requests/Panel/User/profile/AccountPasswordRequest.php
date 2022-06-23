<?php

namespace App\Http\Requests\Panel\User\profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AccountPasswordRequest extends FormRequest
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
            'old_password' => ['required', 'string', 'max:256', Rules\Password::defaults()],
            'new_password' => ['required', 'string', 'max:256', Rules\Password::defaults()],
        ];
    }
}
