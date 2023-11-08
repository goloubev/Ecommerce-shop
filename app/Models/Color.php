<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 */
class Color extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'colors';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

}
