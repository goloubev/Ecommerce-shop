<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class)->name('admin.main.index');

Route::group(['prefix' => 'orders'], function()
{
    Route::get('/', \App\Http\Controllers\Admin\Order\IndexController::class)->name('admin.order.index');
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
    Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
    Route::post('/store', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
    Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
    Route::get('/{category}/show', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
    Route::post('/{category}/update', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
    Route::post('/{category}/delete', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('admin.category.delete');
});

Route::group(['prefix' => 'groups'], function() {
    Route::get('/', \App\Http\Controllers\Admin\Group\IndexController::class)->name('admin.group.index');
    Route::get('/create', \App\Http\Controllers\Admin\Group\CreateController::class)->name('admin.group.create');
    Route::post('/store', \App\Http\Controllers\Admin\Group\StoreController::class)->name('admin.group.store');
    Route::get('/{group}/edit', \App\Http\Controllers\Admin\Group\EditController::class)->name('admin.group.edit');
    Route::get('/{group}/show', \App\Http\Controllers\Admin\Group\ShowController::class)->name('admin.group.show');
    Route::post('/{group}/update', \App\Http\Controllers\Admin\Group\UpdateController::class)->name('admin.group.update');
    Route::post('/{group}/delete', \App\Http\Controllers\Admin\Group\DeleteController::class)->name('admin.group.delete');
});

Route::group(['prefix' => 'tags'], function() {
    Route::get('/', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
    Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
    Route::post('/store', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
    Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit');
    Route::get('/{tag}/show', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show');
    Route::post('/{tag}/update', \App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update');
    Route::post('/{tag}/delete', \App\Http\Controllers\Admin\Tag\DeleteController::class)->name('admin.tag.delete');
});

Route::group(['prefix' => 'colors'], function() {
    Route::get('/', \App\Http\Controllers\Admin\Color\IndexController::class)->name('admin.color.index');
    Route::get('/create', \App\Http\Controllers\Admin\Color\CreateController::class)->name('admin.color.create');
    Route::post('/store', \App\Http\Controllers\Admin\Color\StoreController::class)->name('admin.color.store');
    Route::get('/{color}/edit', \App\Http\Controllers\Admin\Color\EditController::class)->name('admin.color.edit');
    Route::get('/{color}/show', \App\Http\Controllers\Admin\Color\ShowController::class)->name('admin.color.show');
    Route::post('/{color}/update', \App\Http\Controllers\Admin\Color\UpdateController::class)->name('admin.color.update');
    Route::post('/{color}/delete', \App\Http\Controllers\Admin\Color\DeleteController::class)->name('admin.color.delete');
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
    Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
    Route::post('/store', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
    Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
    Route::get('/{user}/show', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
    Route::post('/{user}/update', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
    Route::post('/{user}/delete', \App\Http\Controllers\Admin\User\DeleteController::class)->name('admin.user.delete');
});

Route::group(['prefix' => 'products'], function() {
    Route::get('/', \App\Http\Controllers\Admin\Product\IndexController::class)->name('admin.product.index');
    Route::get('/create', \App\Http\Controllers\Admin\Product\CreateController::class)->name('admin.product.create');
    Route::post('/store', \App\Http\Controllers\Admin\Product\StoreController::class)->name('admin.product.store');
    Route::get('/{product}/edit', \App\Http\Controllers\Admin\Product\EditController::class)->name('admin.product.edit');
    Route::get('/{product}/show', \App\Http\Controllers\Admin\Product\ShowController::class)->name('admin.product.show');
    Route::post('/{product}/update', \App\Http\Controllers\Admin\Product\UpdateController::class)->name('admin.product.update');
    Route::post('/{product}/delete', \App\Http\Controllers\Admin\Product\DeleteController::class)->name('admin.product.delete');
});
