<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Product $product): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();

        return view('admin/products/edit', [
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags,
            'colors' => $colors,
        ]);
    }
}
