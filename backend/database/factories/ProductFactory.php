<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->safeColorName(),
            'sku' => "JL-" . fake()->numberBetween(1234567, 9999999),
            'unit_price' => fake()->numberBetween(100000, 500000)
        ];
    }
}
