<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create($data)
 * @method static firstOrCreate(mixed $data)
 * @method static where(string $string, mixed $group_id)
 * @property mixed $category_id
 * @property mixed $category
 * @property mixed group_id
 * @property mixed $group
 * @property mixed $tags
 * @property mixed $colors
 * @property array $tagsArray
 * @property array $colorsArray
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $content
 * @property mixed $price
 * @property mixed $price_old
 * @property mixed $count
 * @property mixed $is_published
 * @property mixed $product_id
 * @property mixed $file_path
 * @property mixed $images
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

    public function images(): HasMany
    {
        // ONE to MANY
        // From PRODUCTS to IMAGES
        // Table: product_images
        // product_id -> id
        $result = $this->hasMany(
            ProductImage::class,
            'product_id',
            'id'
        );
        return $result;
    }

    public function category(): BelongsTo
    {
        // ONE to ONE
        // From PRODUCTS (category_id) to CATEGORIES (id)
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function group(): BelongsTo
    {
        // ONE to ONE
        // From PRODUCTS (group_id) to GROUPS (id)
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
