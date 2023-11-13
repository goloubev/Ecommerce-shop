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
        foreach ($product->images as $image) {
            if ($image->file_path != null && Storage::exists($image->file_path)) {
                Storage::delete($image->file_path);
            }
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Successfully deleted');
    }
}
