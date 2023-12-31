<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(array $array)
 */
class ProductTag extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'product_tags';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
