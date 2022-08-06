<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailOrder>
 */
class DetailOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = Order::query()
            ->select('id')
            ->orderByRaw(DB::raw('RAND()'))
            ->first();

        $product = Product::query()
            ->select('id')
            ->orderByRaw(DB::raw('RAND()'))
            ->first();

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'qty' => fake()->numberBetween(5, 100),
            'unit_price' => fake()->numberBetween(120000, 500000)
        ];
    }
}
