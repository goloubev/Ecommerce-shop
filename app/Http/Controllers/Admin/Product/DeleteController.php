<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        if ($product->preview_image_1 != null && Storage::exists($product->preview_image_1)) {
            Storage::delete($product->preview_image_1);
        }

        if ($product->preview_image_2 != null && Storage::exists($product->preview_image_2)) {
            Storage::delete($product->preview_image_2);
        }

        if ($product->preview_image_3 != null && Storage::exists($product->preview_image_3)) {
            Storage::delete($product->preview_image_3);
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Successfully deleted');
    }
}
