<?php

namespace Tests\Feature;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_get(): void
    {
        (new DatabaseSeeder)->run();

        $order = Order::query()->with('products')->first();

        // dd($order->products, $order->total, OrderResource::make($order)->toArray(new Request()));
        
        $response = $this->get(route("orders.get", ['order' => $order]));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => OrderResource::make($order)->toArray(new Request())
        ]);
    }
}
