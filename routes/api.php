<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// http://ecommerce_shop.local/api/products
Route::get('/products', \App\Http\Controllers\Admin\API\Product\IndexController::class);
