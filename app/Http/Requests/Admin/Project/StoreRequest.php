<?php

namespace App\Http\Requests\Admin\Project;

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
            'title' => 'required|string|unique:projects,title',
            'description' => 'required|string',
            'date_deadline' => 'required|date',
            'time_deadline' => 'required|date_format:H:i',
        ];
    }

    public function messages(): array
    {
        return [
          'title.unique:projects,title' => 'Проект с таким названием уже существует',
          'time_deadline.date_format:H:i'  => 'Формат времени должен быть: часы:минуты',
          'title.required' => 'Это поле необходимо заполнить',
          'description.required' => 'Это поле необходимо заполнить',
          'date_deadline.required' => 'Это поле необходимо заполнить',
          'time_deadline.required' => 'Это поле необходимо заполнить',
        ];
    }
}
