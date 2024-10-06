<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Order $this */

        return [
            'id' => $this->id,
            'created_at' => $this->created_at->toDateTimeString(),
            'total' => round($this->total, 2),
            'products' => $this->products->map(fn(OrderProduct $op) => [
                'id' => $op->id,
                'name' => $op->name,
                'price' => round($op->price, 2),
                'discount_percent' => round($op->discount_percent, 2),
                'total' => round($op->total, 2),
            ])->toArray(),
        ];
    }
}
