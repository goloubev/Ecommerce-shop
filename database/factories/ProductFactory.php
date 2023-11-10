<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->words(3, true)),
            'description' => fake()->paragraph(2),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'preview_image' => '/images/products/image_' . rand(1, 100) . '.jpg',
            'price' => (float)rand(10, 300),
            'count' => rand(10, 99),
            'is_published' => '1',
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
