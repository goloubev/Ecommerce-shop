<?php

namespace App\Http\Controllers\Admin\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;

class FilterListController extends Controller
{
    public function __invoke(Product $product): JsonResponse
    {
        $result = [
            'categories' => CategoryResource::collection(Category::all()),
            'colors' => ColorResource::collection(Color::all()),
            'tags' => TagResource::collection(Tag::all()),
            'price' => [
                'min' => Product::min('price'),
                'max' => Product::max('price'),
            ],
        ];

        return response()->json($result);
    }
}
