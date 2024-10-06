<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property float $total
 * 
 * @property Collection $products
 */
class Order extends Model
{
    use HasFactory;
    
    protected $appends = [
        "total",
    ];

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function getTotalAttribute(): float
    {
        return array_reduce($this->products->all(), fn($price, OrderProduct $op) => $price + $op->total, 0);
    }
}
