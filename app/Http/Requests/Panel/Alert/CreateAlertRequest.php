<?php

namespace App\Http\Requests\Panel\Alert;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlertRequest extends FormRequest
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
            'title' => ['required','string', 'max:255'],
            'btn_txt' => ['required','string', 'max:255'],
            'link' => ['required','string', 'max:255'],
            'title_color' => ['required','string', 'max:10'],
            'btn_color' => ['required','string', 'max:10'],
            'btn_bg_color' => ['required','string', 'max:10'],
            'btn_bg_hover_color' => ['required','string', 'max:10'],
            'bg_color' => ['required','string', 'max:10'],
            'expiry_date' => ['required','date_format:Y-m-d H:i:s']
        ];
    }
}
