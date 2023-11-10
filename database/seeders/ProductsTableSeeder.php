<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $productIds = Product::factory(20)->create();

        /** @var Product $product */
        foreach ($productIds as $product) {
            $tagIds = Tag::inRandomOrder()->take(3)->pluck('id');
            $product->tags()->attach($tagIds);

            $colorIds = Color::inRandomOrder()->take(5)->pluck('id');
            $product->colors()->attach($colorIds);
        }
    }
}
