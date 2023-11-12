<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'GROUP-'.ucfirst(fake()->words(2, true)),
        ];
    }
}
