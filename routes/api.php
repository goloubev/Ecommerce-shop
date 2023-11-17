<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// http://ecommerce_shop.local/api/products
Route::get('/products', \App\Http\Controllers\Admin\API\Product\IndexController::class);
Route::post('/products', \App\Http\Controllers\Admin\API\Product\IndexController::class);

// http://ecommerce_shop.local/api/products/filters
Route::get('/products/filters', \App\Http\Controllers\Admin\API\Product\FilterListController::class);

// http://ecommerce_shop.local/api/products/1
Route::get('/products/{product}', \App\Http\Controllers\Admin\API\Product\ShowController::class);

// http://ecommerce_shop.local/api/orders
Route::post('/orders', \App\Http\Controllers\Admin\API\Order\StoreController::class);
