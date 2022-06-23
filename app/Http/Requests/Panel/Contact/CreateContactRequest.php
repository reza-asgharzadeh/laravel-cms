<?php

namespace App\Http\Requests\Panel\Contact;

use App\Rules\recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100'],
            'content' => ['required','string','max:30000'],
            'g-recaptcha-response' => [new recaptcha()]
        ];
    }
}
