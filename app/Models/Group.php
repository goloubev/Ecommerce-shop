<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(mixed $data)
 * @method static where(string $string, $group_id)
 * @method static inRandomOrder()
 */
class Group extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'groups';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'group_id', 'id');
    }
}
