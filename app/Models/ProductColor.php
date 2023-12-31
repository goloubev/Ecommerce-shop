<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(array $array)
 */
class ProductColor extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'product_colors';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
