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
        if ($product->preview_image != null && Storage::exists($product->preview_image)) {
            Storage::delete($product->preview_image);
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Successfully deleted');
    }
}
