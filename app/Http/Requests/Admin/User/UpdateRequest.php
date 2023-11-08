<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'    => ['required', 'string'],
            'last_name'     => ['required', 'string'],
            'age'           => ['nullable', 'integer'],
            'address'       => ['nullable', 'string'],
            'gender'        => ['nullable', 'integer'],
        ];
    }
}
