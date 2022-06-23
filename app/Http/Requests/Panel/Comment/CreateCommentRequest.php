<?php

namespace App\Http\Requests\Panel\Comment;

use App\Rules\recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
            'content' => ['required','string','max:30000'],
            'comment_id' => ['nullable', 'integer'],
            'g-recaptcha-response' => [new recaptcha()]
        ];
    }
}
