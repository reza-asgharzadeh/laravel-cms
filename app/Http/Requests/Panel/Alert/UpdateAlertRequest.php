<?php

namespace App\Http\Requests\Panel\Alert;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlertRequest extends FormRequest
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
            'title' => ['required','string', 'max:200'],
            'btn_txt' => ['required','string', 'max:50'],
            'link' => ['required','string', 'max:150'],
            'title_color' => ['required','string', 'max:7'],
            'btn_color' => ['required','string', 'max:7'],
            'btn_bg_color' => ['required','string', 'max:7'],
            'btn_bg_hover_color' => ['required','string', 'max:7'],
            'bg_color' => ['required','string', 'max:7'],
            'expiry_date' => ['nullable','date_format:Y-m-d H:i:s']
        ];
    }
}
