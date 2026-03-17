<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPersonRequest extends FormRequest
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
            'fio' => 'required|min:5|max:50',
            //'pol' => 'nullable|boolean',
            'data_rozhd' => 'nullable|date',
            'mesto_rozhd' => 'nullable',
            'telefon' => 'nullable|min:6|max:50',
            'socials' => 'nullable|min:6|max:50',
            'comments' => 'nullable|max:255'
        ];
    }

    public function attributes() {
        return [
            'fio' => 'ФИО',
            'pol' => 'Пол',
            'data_rozhd' => 'Дата рождения',
            'mesto_rozhd' => 'Место рождения',
            'telefon' => 'Телефон',
            'socials' => 'Соц.сети/мессенджер',
            'comments' => 'Комментарии'
        ];
    }

    public function messages() {
        return [
            '*.required' => 'Поле \':attribute\' является обязательным.',
            'fio.min' => 'Поле \'ФИО\' не может быть менее 5 символов.',
            'fio.max' => 'Поле \'ФИО\' не может быть более 50 символов.',
            'data_rozhd.date' => 'Формат поля \'Дата рождения\': ДД.ММ.ГГГГ.',
            'telefon.min' => 'Поле \'Телефон\' не может быть менее 6 символов.',
            'telefon.max' => 'Поле \'Телефон\' не может быть более 50 символов.',
            'socials.min' => 'Поле \'Соц.сети/мессенджер\' не может быть менее 6 символов.',
            'socials.max' => 'Поле \'Соц.сети/мессенджер\' не может быть более 50 символов.',
            'comments.max' => 'Поле \'Комментарии\' не может быть более 255 символов.'
        ];
    }
}