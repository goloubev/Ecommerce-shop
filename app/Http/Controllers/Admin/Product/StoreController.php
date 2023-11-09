<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
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

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            }

            $product = Product::firstOrCreate($data);

            if (isset($tagIds)) {
                foreach ($tagIds as $tagId) {
                    ProductTag::firstOrCreate([
                        'product_id' => $product->id,
                        'tag_id' => $tagId,
                    ]);
                }

                //$product->tags()->attach($tagIds);
            }

            if (isset($colorIds)) {
                foreach ($colorIds as $colorId) {
                    ProductColor::firstOrCreate([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                    ]);
                }

                //$product->colors()->attach($colorIds);
            }

            DB::commit();
        }
        catch (Exception) {
            DB::rollBack();
            abort(404);
        }

        return redirect()->route('admin.product.show', $product)->with('success', 'Successfully created');
    }
}
