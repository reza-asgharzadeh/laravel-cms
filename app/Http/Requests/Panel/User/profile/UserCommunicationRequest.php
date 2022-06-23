<?php

namespace App\Http\Requests\Panel\User\profile;

use Illuminate\Foundation\Http\FormRequest;

class UserCommunicationRequest extends FormRequest
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
            'website' => ['nullable', 'string', 'max:120'],
            'github' => ['nullable', 'string', 'max:120'],
            'linkedin' => ['nullable', 'string', 'max:120'],
            'telegram' => ['nullable', 'string', 'max:120'],
            'instagram' => ['nullable', 'string', 'max:120'],
            'twitter' => ['nullable', 'string', 'max:120']
        ];
    }
}
