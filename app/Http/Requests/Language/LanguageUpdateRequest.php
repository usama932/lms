<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class LanguageUpdateRequest extends FormRequest
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
            'name'     => 'required|unique:languages,name,'.Request()->id,
            'code'     => 'required',
            'flagIcon' => 'required'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required'     => ___('validation.Name_is_required'),
            'name.unique'       => ___('validation.Name_is_already_taken'),
            'code.required'     => ___('validation.Code_is_required'),
            'flagIcon.required' => ___('validation.Flag_icon_is_required')
        ];
    }
}
