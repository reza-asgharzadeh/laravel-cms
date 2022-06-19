<?php

namespace App\Http\Requests\Panel\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $role = $this->route('role');

        return [
            'name' => ['required','string', 'max:20', Rule::unique('roles')->ignore($role->id)],
            'label' => ['required','string', 'max:20', Rule::unique('roles')->ignore($role->id)]
        ];
    }
}
