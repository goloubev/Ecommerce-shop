<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'TAG-'.ucfirst(fake()->words(1, true)),
        ];
    }
}
