<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $group_id
 */
class IndexProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Product $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            //'content' => $this->content,
            'preview_image_1' => Storage::url($this->preview_image_1),
            'preview_image_2' => Storage::url($this->preview_image_2),
            'preview_image_3' => Storage::url($this->preview_image_3),
            'price' => $this->price,
            'price_old' => $this->price_old,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'colors' => ColorResource::collection($this->colors),
        ];
    }
}
