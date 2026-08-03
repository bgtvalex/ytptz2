<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewVersionRequest extends FormRequest
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
            'version' => 'required|min:5|max:50',
            'theme' => 'required|min:4|max:50',
            'desc' => 'nullable|min:6|max:255'
        ];
    }

    public function attributes() {
        return [
            'version' => 'Версия',
            'theme' => 'Тема',
            'desc' => 'Описание',
        ];
    }

    public function messages() {
        return [
            '*.required' => 'Поле \':attribute\' является обязательным.'
        ];
    }
}