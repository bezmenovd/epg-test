<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $order = Order::query()->create();

            for ($j = 0; $j < random_int(1, 10); $j++) {
                $orderProduct = new OrderProduct();
                $orderProduct->name = fake()->name();
                $orderProduct->price = fake()->randomFloat(2, 10, 10000);
                $orderProduct->quantity = random_int(1, 10);
                $orderProduct->discount_percent = fake()->randomFloat(2, 0, 100);
                $orderProduct->order()->associate($order);
                $orderProduct->save();
            }
        }
    }
}
