<?php

namespace App\Http\Controllers\Admin\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke(IndexRequest $request): AnonymousResourceCollection
    {
        $data = $request->validated();

        if (!isset($data['order'])) {
            $data['order'] = 'title|asc';
        }

        $filter = app()->make(ProductFilter::class, [
            'queryParams' => array_filter($data)
        ]);

        // php artisan make:resource Product/ProductResource
        // php artisan make:resource Category/CategoryResource
        $products = Product::filter($filter)->paginate(3, ['*'], 'page', $data['page']);
        $result = IndexProductResource::collection($products);

        return $result;
    }
}
