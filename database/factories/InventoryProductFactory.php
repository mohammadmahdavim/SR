<?php

namespace Database\Factories;

use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryProduct>
 */
class InventoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_type_id' => ProductType::inRandomOrder()->first('id'),
            'serialNumber' => fake()->numerify('##########'),
            'code' => fake()->numerify('##########'),
            'buy_price' => fake()->numerify('#########0000'),
            'model' => fake()->numerify('#######'),
            'status' => 'rentable',
            'hour_used' => fake()->numerify('###'),
            'created_by' => User::inRandomOrder()->first('id'),
            'ip_created_by'  => fake()->numerify('##########'),
        ];
    }
}
