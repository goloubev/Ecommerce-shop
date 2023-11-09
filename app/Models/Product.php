<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create($data)
 * @property mixed        $preview_image
 * @property mixed        $category_id
 * @property mixed|string $categoryName
 * @property mixed        $tags
 * @property mixed        $colors
 * @property array        $tagsArray
 * @property array        $colorsArray
 */
class Product extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'products';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public function tags(): BelongsToMany
    {
        // MANY to MANY
        // From PRODUCTS to TAGS
        // Table: product_tags
        // product_id -> tag_id
        $result = $this->belongsToMany(
            Tag::class,
            'product_tags',
            'product_id',
            'tag_id'
        );
        return $result;
    }

    public function colors(): BelongsToMany
    {
        // MANY to MANY
        // From PRODUCTS to COLORS
        // Table: product_colors
        // product_id -> color_id
        $result = $this->belongsToMany(
            Color::class,
            'product_colors',
            'product_id',
            'color_id'
        );
        return $result;
    }
}
