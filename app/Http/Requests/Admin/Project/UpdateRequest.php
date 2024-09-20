<?php

namespace App\Http\Requests\Admin\Project;

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
            'title' => 'nullable|string|unique:projects,title',
            'description' => 'nullable|string',
            'date_deadline' => 'nullable|date',
            'time_deadline' => 'nullable|date_format:H:i',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique:projects,title' => 'Проект с таким названием уже существует',
            'time_deadline.date_format:H:i'  => 'Формат времени должен быть: часы:минуты',
        ];
    }
}
