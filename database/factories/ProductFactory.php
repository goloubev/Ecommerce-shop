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
        $price = fake()->randomFloat(2, 100, 300);

        return [
            'title' => ucfirst(fake()->words(3, true)),
            'description' => fake()->paragraph(2),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'preview_image' => $this->randomProductImage(),
            'price' => $price,
            'price_old' => $price + 30,
            'count' => rand(10, 99),
            'is_published' => true,
            'category_id' => Category::inRandomOrder()->first()->id,
            'group_id' => Group::inRandomOrder()->first()->id,
        ];
    }

    public function randomProductImage()
    {
        $thumbnails = Storage::files('products_fake');
        $thumbnailsCount = count($thumbnails) - 1;
        $result = $thumbnails[rand(0, $thumbnailsCount)];

        return $result;
    }
}
