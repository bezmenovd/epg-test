<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController
{
    public function get(Order $order)
    {
        return OrderResource::make($order);
    }
}
