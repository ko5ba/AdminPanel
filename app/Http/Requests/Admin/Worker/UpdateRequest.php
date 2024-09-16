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
            'name' => ['required', new FullName],
            'age' => 'required|integer|between:1,65',
            'description' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:workers,email',
            'position_id' => 'required|integer|exists:positions,id'
        ];
    }
}
