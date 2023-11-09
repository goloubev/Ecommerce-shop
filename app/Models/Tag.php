<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 */
class Tag extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'tags';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public static function getTags($collection): array
    {
        $result = [];

        foreach ($collection as $element) {
            $result[$element->id] = $element->title;
        }

        return $result;
    }
}
