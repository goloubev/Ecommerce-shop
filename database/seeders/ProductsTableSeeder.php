<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $productIds = Product::factory(4)->create();

        /** @var Product $product */
        foreach ($productIds as $product) {
            $tagIds = Tag::inRandomOrder()->take(3)->pluck('id');
            $product->tags()->attach($tagIds);

            $colorIds = Color::inRandomOrder()->take(1)->pluck('id');
            $product->colors()->attach($colorIds);

            for ($i = 1; $i <= 3; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path'  => $this->randomProductImage(),
                ]);
            }
        }
    }

    public function randomProductImage()
    {
        $thumbnails = Storage::files('products_fake');
        $thumbnailsCount = count($thumbnails) - 1;
        $result = $thumbnails[rand(0, $thumbnailsCount)];

        return $result;
    }
}
