<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
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

            $product = Product::create($data);

            if (isset($tagIds)) {
                $product->tags()->attach($tagIds);
            }

            if (isset($colorIds)) {
                $product->colors()->attach($colorIds);
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
