<?php

namespace App\Http\Requests\Admin\Worker;

use App\Rules\Admin\Worker\FullName;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'age' => 'nullable|integer|between:18,65',
            'description' => 'nullable|string',
            'email' => 'nullable|string|email|unique:workers,email',
            'position_id' => 'nullable|integer|exists:positions,id'
        ];
    }

    public function messages(): array
    {
        return [
            'age.between:18,65' => 'Возраст должен быть от 18 до 65',
            'email.unique:workers,email' => 'Такой адрес почты уже есть в списке',
            'position_id.exists:positions,id' => 'Такой должности нет в списке'
        ];
    }
}
