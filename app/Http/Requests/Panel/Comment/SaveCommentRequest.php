<?php

namespace App\Http\Requests\Panel\Comment;

use Illuminate\Foundation\Http\FormRequest;

class SaveCommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => ['required','string','max:30000'],
            'comment_id' => ['nullable', 'integer']
        ];
    }
}
