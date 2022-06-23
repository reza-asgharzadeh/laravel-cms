<?php

namespace App\Http\Requests\Panel\User\profile;

use Illuminate\Foundation\Http\FormRequest;

class UserInformationRequest extends FormRequest
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
            'birthday' => ['nullable','date', 'date_format:Y/m/d', 'max:10'],
            'job' => ['nullable', 'string', 'max:200'],
            'about_me' => ['nullable','string','max:30000']
        ];
    }
}
