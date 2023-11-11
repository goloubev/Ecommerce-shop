<?php

namespace App\Http\Controllers\Admin\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        // php artisan make:resource Product/ProductResource
        // php artisan make:resource Category/CategoryResource
        $products = Product::all();

        return ProductResource::collection($products);
    }
}
