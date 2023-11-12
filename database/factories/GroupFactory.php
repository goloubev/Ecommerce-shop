<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'CATEGORY-'.ucfirst(fake()->words(3, true)),
        ];
    }
}
