<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'categories' => ['nullable', 'array'],
            'colors' => ['nullable', 'array'],
            'tags' => ['nullable', 'array'],
            'prices' => ['nullable', 'array'],
            'order' => ['nullable', 'string'],
            'page' => ['required', 'integer'],
        ];
    }
}
