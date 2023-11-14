<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 300);

        return [
            'title' => ucfirst(fake()->words(3, true)),
            'description' => fake()->paragraph(2),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'price' => $price,
            'price_old' => $price + 10,
            'count' => rand(10, 99),
            'is_published' => true,
            'category_id' => Category::inRandomOrder()->first()->id,
            'group_id' => Group::inRandomOrder()->first()->id,
        ];
    }
}
