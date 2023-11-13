<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['color_ids'])) {
                $colorIds = $data['color_ids'];
                unset($data['color_ids']);
            }

            if (isset($data['product_images'])) {
                $productImages = $data['product_images'];
                unset($data['product_images']);
            }

            $product->update($data);

            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }

            if (isset($colorIds)) {
                $product->colors()->sync($colorIds);
            }

            if (isset($productImages)) {
                foreach ($productImages as $productImage) {
                    if (isset($productImage)) {
                        $filePath = Storage::put('/images', $productImage);

                        ProductImage::create([
                            'product_id' => $product->id,
                            'file_path' => $filePath,
                        ]);
                    }
                }
            }

            DB::commit();
        }
        catch (Exception) {
            DB::rollBack();
            abort(404);
        }

        return redirect()->route('admin.product.show', $product)->with('success', 'Successfully updated');
    }
}
