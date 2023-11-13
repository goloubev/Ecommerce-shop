<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ProductImage extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'product_images';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
