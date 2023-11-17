<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class Order extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'orders';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public function user(): BelongsTo
    {
        // ONE to ONE
        // From ORDERS to USERS
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
