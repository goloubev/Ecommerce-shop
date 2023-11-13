<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'product_images' => ['nullable', 'array'],
            'price' => ['required', 'decimal:0,2'],
            'price_old' => ['nullable', 'decimal:0,2'],
            'count' => ['required', 'integer', 'min:1', 'max:9999'],
            'is_published' => ['required', 'boolean'],
            'category_id' => ['nullable'],
            'group_id' => ['nullable'],
            'tag_ids' => ['nullable', 'array'],
            'color_ids' => ['nullable', 'array'],
        ];
    }
}
