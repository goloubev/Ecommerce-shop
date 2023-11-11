<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(Product $product): View
    {
        $product->tagsArray = Tag::getTags($product->tags);
        $product->colorsArray = Color::getColors($product->colors);

        return view('admin/products/show', [
            'product' => $product,
        ]);
    }
}
