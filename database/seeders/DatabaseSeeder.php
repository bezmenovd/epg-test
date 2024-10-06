<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i = 0; $i < 10; $i++) {
            $order = Order::query()->create();

            for ($i = 0; $i < random_int(1, 10); $i++) {
                $orderProduct = new OrderProduct();
                $orderProduct->name = fake()->name();
                $orderProduct->price = fake()->randomFloat(2, 10, 10000);
                $orderProduct->discount_percent = fake()->randomFloat(2, 0, 100);
                $orderProduct->order()->associate($order);
                $orderProduct->save();
            }
        }
    }
}
