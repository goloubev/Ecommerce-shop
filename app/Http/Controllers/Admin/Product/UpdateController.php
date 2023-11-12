<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
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

            if (isset($data['preview_image_1'])) {
                $data['preview_image_1'] = Storage::put('/images', $data['preview_image_1']);
            }

            if (isset($data['preview_image_2'])) {
                $data['preview_image_2'] = Storage::put('/images', $data['preview_image_2']);
            }

            if (isset($data['preview_image_3'])) {
                $data['preview_image_3'] = Storage::put('/images', $data['preview_image_3']);
            }

        	$product->update($data);

            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }

            if (isset($colorIds)) {
                $product->colors()->sync($colorIds);
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
