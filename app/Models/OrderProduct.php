<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $quantity
 * @property float $discount_percent
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property float $total
 * 
 * @property Order $order
 */
class OrderProduct extends Model
{
    use HasFactory;

    protected $appends = [
        "total",
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function getTotalAttribute(): float
    {
        return $this->price * $this->quantity * (100 - $this->discount_percent);
    }
}
