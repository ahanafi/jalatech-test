<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['PURCHASE', 'SALE'];
        $status = ['PENDING', 'APPROVED'];
        return [
            'invoice_number' => "INV-" . fake()->numberBetween(1234567, 9999999),
            'customer_name' => fake()->name(),
            'date' => fake()->date(),
            'type' => $type[array_rand($type)],
            'status' => $status[array_rand($status)],
        ];
    }
}
