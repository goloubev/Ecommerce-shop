<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 * @method static where(string $string, $category_id)
 * @method static inRandomOrder()
 */
class Category extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'categories';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public static function getCategoryTitle($category_id): string
    {
        $result = [];
        $categories = Category::all();

        foreach ($categories as $category) {
            $result[$category->id] = $category->title;
        }

        return $result[$category_id];
    }
}
