<?php

namespace App\Http\Requests\Admin\Worker;

use App\Rules\Admin\Worker\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|',
            'last_name' => 'required|string|',
            'patronymic' => 'required|string|',
            'age' => 'required|integer|between:18,65',
            'description' => 'nullable|string',
            'email' => 'required|string|email|unique:workers,email',
            'position_id' => 'required|integer|exists:positions,id'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Это поле необходимо заполнить',
            'last_name.required' => 'Это поле необходимо заполнить',
            'patronymic.required' => 'Это поле необходимо заполнить',
            'age.required' => 'Это поле необходимо заполнить',
            'email.required' => 'Это поле необходимо заполнить',
            'position_id.required' => 'Это поле необходимо заполнить',
            'age.between:18,65' => 'Возраст должен быть от 18 до 65',
            'email.unique:workers,email' => 'Такой адрес почты уже есть в списке',
            'position_id.exists:positions,id' => 'Такой должности нет в списке'
        ];
    }
}
