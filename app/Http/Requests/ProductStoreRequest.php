<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50',
            'info' => 'required|max:255',
            'img' => 'required|file|mimes:jpg,png',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'category' => 'required|min:3|max:10',
        ];
        /*digits_between:min,max
        prohibited - Проверяемое поле должно быть пустым или отсутствовать.
        required_if:anotherfield,value - Проверяемое поле должно присутствовать и не быть пустым, если поле anotherfield равно любому value.
        */
    }

    public function messages()
    {
        return [
            'name' => [
              'required' => 'Поле Name не заполнено',
              'min' => 'Поле Name должно быть не меньше 3',
              'max' => 'Поле Name должно быть не больше 50',
            ],
            'info' => [
                'required' => 'Поле Info не заполнено',
                'max' => 'Поле Info должно быть не больше 255',
            ],
            'img' => [
                'required' => 'Изображение отсутсвует',
                'file' => 'Ошибка с файлом изображения',
                'mimes' => 'Формат файла изображения должен быть: .jpg .png',
            ],
            'price' => [
                'numeric' => 'Поле Price должно содержать только числа',
            ],
            'price_sale' => [
                'numeric' => 'Поле Price_sale должно содержать только числа',
            ],
            'category' => [
                'required' => 'Поле Category не заполнено',
                'min' => 'Поле Category должно быть не меньше 3',
                'max' => 'Поле Category должно быть не больше 10',
            ]
        ];
    }
}
